<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{

    public function __construct() {
        $this->middleware('guest:admin')->except(["logout"]);
    }
    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(Request $request)     
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt($request->only('email','password'),$request->get('remember'))) {
            return redirect()->route('admin.dashboard.home');
        } else {
            return redirect()->back()->withInput(['email' => $request->email])->withErrors(['errorResponse'=> "this credentials do not our recordes"]);

        }   
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        // Redirect users to the appropriate route after logout
        return redirect()->route('admin.dashboard.login'); // Assuming 'user.profile' is the correct route for the user profile
    }
}
