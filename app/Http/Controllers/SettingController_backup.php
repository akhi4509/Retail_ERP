<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Auth;
use App\User;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    
 
        $settings = Settings::all();
        return view('admin.setting.settings', compact('settings'));


    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = new Setting();
        $settings->save();
        return 'Basic Settings is created..<a href="'.url('dashboard').'">Goto To Dashboard</a>';
        // return view('admin.setting.settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_address' => 'required|string|max:255',
            'business_phone_no' => 'required|string|max:15',
            'gst_no' => 'nullable|string|max:255',
            'sales_profit' => 'required|numeric',
            'discount' => 'required|numeric',
            'cgst' => 'required|numeric',
            'sgst' => 'required|numeric',
        ]);

        Business::create($request->all());
        return redirect()->route('businesses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('setting.edit', ['settings'=>$setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
      $setting->business_name = $request->bname;
      $setting->business_address = $request->baddr;
      $setting->business_phone_no = $request->phone;
      $setting->gst_no = $request->gst_no;
      $setting->sales_profit = $request->profit;
      $setting->discount = $request->discount;
      $setting->cgst = $request->cgst;
      $setting->sgst = $request->sgst;
      $setting->save();

      return redirect('settings');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function setType($id,$type = ''){
      // $user = Auth::user();
      // if($type != ''){
      //   $user->type = $type;
      //   $user->save();
      // }
      $user = User::where('id',$id)->first();
      if($type != ''){
        $user->type = $type;
        $user->save();
      }

      return $user;
    }
}
