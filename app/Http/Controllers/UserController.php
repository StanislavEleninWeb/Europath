<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserController extends Controller
{

	/**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
    	return view('user.login');
    }
    
	/**
     * Login User
     *
     * @return \Illuminate\Http\Response
     */
    public function loginCheck(Request $request)
    {
        
    	$validated = Validator::make($request->all(), [
    		'email' => 'required|email',
    		'password' => 'required',
    	]);

    	$user = User::where('email', $validated['email'])->firstOrFail();

    	$credentialsCheck = Hash::check($validated['password'], $user->password);
    }

}
