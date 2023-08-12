<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if(auth()->guard('employee')->check())
        {
            return redirect()->route('employee.dashboard');
        }
        return view('employee.auth.login');
    }
    public function loginAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if (auth()->guard('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/employee/dashboard');
            }else{
                $errordata = array('email' => 'Username or Password is incorrect',);
                return back()->withErrors($errordata)->withInput();
            }
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('employee.login');
    }
}
