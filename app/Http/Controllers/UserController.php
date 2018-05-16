<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignUp(Request $request){

    	$this->validate($request, [
    		'email' => 'required|email|unique:users',  // It will only work if 'email' is used as exactly 'email' in migration class, it will check in the table users for uniqueness 
    		'username' => 'required|max:120',          // maximum 120
    		'password' => 'required|min:4'             // minimum 4 character
    	]);

    	$username = $request['username'];
    	$email = $request['email'];
    	$password = bcrypt($request['password']);

    	$user =  new User();

    	$user->name = $username;
    	$user->email = $email;
    	$user->password = $password;

    	$user->save();

    	Auth::login($user);                        // This officially logs in the user, ensures the security of the dashboard 

    	return redirect()->back();

    }

    public function postSignIn(Request $request){

    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
    		return redirect()->route('dashboard');
    	}

    	return redirect()->back();

    }

    public function getLogOut(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function guestIn(){
        return redirect()->route('dashboard');
    }	
}
