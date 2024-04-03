<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'customLogin', 'registration', 'customRegistration','dashboard']);
    // }


    // this function is used of redirect to the login page 
    public function index(){

        // return the data of login
        return view('admin.auth.login');
    }

    // this function is used for all users login
    
    public function customLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        // dd($request);exit;

        // check the requedt of only email and password
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login Details Are Not Valid');


    }

    // this function is used of redirect to the Register page 
    public function registration()
    {
        return view('admin.auth.register');
    }

    // this function is used for all users register    

    public function customRegistration(Request $request)
    {  
        
        $request->validate([
            'name' => 'required',
            'username' => 'required|string|max:255|unique:users',
            // 'username'=> 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed-in');
    }

    // this function is used for all users creation(store the data into db)     
     
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'username' => $data['username'],
        'remember_token' => $data['_token'],
        'type' => 'admin',
        'password' => Hash::make($data['password'])
      ]);
    }    

    // this function is used for redirect to the dashboard(check the user is valid user or not)
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("dashboard")->withSuccess('You are not allowed to access');
    }
    
    // this function is used for logout 
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}