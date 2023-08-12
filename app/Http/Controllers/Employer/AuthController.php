<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('employer.auth.login');
    }

    public function loginAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if (auth()->guard('employer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/employer/dashboard');
            }else{
                $errordata = array('email' => 'Username or Password is incorrect',);
                return back()->withErrors($errordata)->withInput();
            }
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->guard('employer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('employer.login');
    }
}
