<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\EmployeeSignupRequest;
use App\Models\Employee;
use App\Models\Employer;
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

    public function vloginAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if (auth()->guard('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/employee/dashboard');
            }elseif (auth()->guard('employer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/employer/dashboard');
            }{
                $errordata = array('email' => 'Username or Password is incorrect',);
                return back()->withErrors($errordata)->withInput();
            }
        }
    }
    public function singup(EmployeeSignupRequest $request)
    {
        if ($request->choice == 'Employee') {
            Employee::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => bcrypt($request->password),
                'is_freelancer' => 1
            ]);
            if (auth()->guard('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/employee/dashboard');
            }
        } else if ($request->choice == 'Employer') {
            Employer::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if (auth()->guard('employer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/employer/dashboard');
            }
        } else {
            return back()->with('warning', 'Unable to Register');
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
