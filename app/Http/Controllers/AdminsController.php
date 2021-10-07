<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){    
            return view('admin.index');
        }
        
        return redirect()->route('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        

    }

    public function login(){
        return view('admin.login');
    }  
     
    public function connection(Request $request){

    //   $credentials = ["name" => "Demey", 
    //                   "first_name" => "Jonathan", 
    //                   "email" => "noctarider@gmail.com", 
    //                   "password" => "1234"];

    //   $credentials['password'] = Hash::make($credentials['password']);
    //   $user = User::create($credentials);

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
           return redirect()->route('admin.index');
        };

        return redirect()->route('login');    
    }  

    public function logout(){
        Auth::logout();
        return redirect()->route('activites.form');
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($work,$collection,$media)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}
