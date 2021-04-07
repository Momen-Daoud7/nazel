<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class RegisterController extends Controller
{
    public function register()
    {
    	return view('auth.register');
    }//end of register

    // Store method
    public function store(Request $request)
    {
    	//validation
    	$data = $request->validate([
    		'name' => 'required|string|min:3',
            'phone' => 'required|numeric|unique:users',
            'orgnaizition' => 'required|string',
            'branch' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
    	]);

    	// Hash the passowrd & store the data
    	$data['password'] = Hash::make($data['password']);

    	User::create($data);

    	return redirect('home')->with('status',trans('trans.your_account_is_under_confirming'));
    }//end of store
}
