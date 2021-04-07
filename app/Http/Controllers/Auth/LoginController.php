<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
	 public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } 

    public  function login_page() {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
    	$data = $request->validate([
    		'phone' => 'required|numeric|min:10',
    		'orgnaizition' => 'required|string',
    		'branch' => 'required|string',
    		'password' => 'required',
    	]);
    	$cred = $request->except(['_token']);
    	$user = User::where('phone',$request->phone)->first();
    	if($data['orgnaizition'] == $user->orgnaizition && $data['branch'] == $user->branch) {
    		if(Auth::attempt($cred))
	    	{
                if($user->status == 'not-active'){
                    return redirect('home')->with('status',trans('trans.your_account_is_under_confirming'));
                }else{
                    return redirec('users');
                }
	    	}
    	}else {
            return back()->with('error' , trans("trans.orgnaizition_and branch_does'nt_matches"));
        } 

        return back()->with('error', trans("trans.phone_number_and_password_does'nt_matches "));
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
