<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail; 
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        
        public function index(){
                $users = User::all();
                return view('admin.user.users', compact('users'));
                // return view('admin.user.users');
        }
        
        public function create(){
                
                return view('admin.user.add');
        }
        
//       

  public function store(Request $request)
    {
            // Validate incoming request data.
           
             $validatedData = $request->validate([
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users',
                        'username' => 'required|string|max:255|unique:users',
                        'password' => 'required|string|min:6',
                        'type' => 'required|string|max:255',
                ]);
                
                // Create user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'type' => $validatedData['type'],
            'remember_token' => Str::random(60),
        ]);

        $to = $user->email;
        $subject = 'Welcome to Our Application';
        $message = 'Dear ' . $user->name . ', welcome to our application. Thank you for registering.';
        
        // Use mail() function to send email
        mail($to, $subject, $message);

        return redirect()->route('admin.users.user')->with('success', 'User created successfully. Email sent successfully.');

     
    }

     public function showUsersOfTypeUser()
    {

        $users = User::where('type', 'user')->get();
        return view('admin.users.user', compact('users'));
    }

     public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validation here if necessary
        
        $user->update($request->all());
        return redirect()->route('admin.user.users')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
         
        $user->delete();
        return redirect()->route('admin.user.users')->with('success', 'User deleted successfully.');
    }


}   