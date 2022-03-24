<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Auth;
use Str;
use App\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::check()){
            return redirect()->route('admin');
        }else{
            return view('auth.login');
        } 
    }
    public function register(){
        if(Auth::check()){
            return redirect()->route('admin');
        }else{
            return view('auth.register');
        } 
    }
    public function registerSubmit(Request $request){
        if(Auth::check()){
            return redirect()->route('admin');
        }else{
            $data=$request->all();
            $check= User::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password']),
                ]);
            
            if($check){
                Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
                Session::put('user',$data['email']);
                request()->session()->flash('success','Successfully registered');
                return redirect()->route('admin');
            }
            else{
                request()->session()->flash('error','Please try again!');
                return back();
            }
        }         
    }
    public function LoginSubmit(Request $request){
        
        if(Auth::check()){
            return redirect()->route('admin');
        }else{
            $data= $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                // dd($data);
                Session::put('user',$data['email']);
                // request()->session()->flash('success','Successfully login');
                return redirect()->route('admin');
            }
            else{
                request()->session()->flash('error','Invalid Email and password please try again!');
                return back();
            }
        }         
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
