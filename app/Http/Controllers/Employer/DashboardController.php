<?php

namespace App\Http\Controllers\Employer;

use App\Constants\AppConstant;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->guard('employer')->user();
        $myjobs = Vacancy::where('employer_id', $user->id)->latest()->paginate(10)->withQueryString();
        return view('employer.dashboard', compact('myjobs'));
    }
    public function change_password()
    {
        return view('employer.change_password');
    }
    public function save_change_password(Request $request)
    {
        $user = auth()->guard('employer')->user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('employer.dashboard')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->withErrors(['old_password' => 'Incorrect current password.']);
        }
    }
    public function profile()
    {
        $user = auth()->guard('employer')->user();
        return view('employer.profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required',
            'description' => 'required|max:500',
            'phone'       => 'required',
            'address'     => 'required',
        ]);
        $user = auth()->guard('employer')->user();
        $user->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'address'     => $request->address,
            'phone'       => $request->phone,
            'description' => $request->description,
        ]);
        return redirect()->route('employer.dashboard');
    }
    public function jobs()
    {
        $data['status'] = AppConstant::REQUIRED;
        $data['type'] = AppConstant::TYPE;
        $categories = Category::orderBy('title')->get();
        return view('employer.jobs', compact('data', 'categories'));
    }
    public function saveJobs(Request $request)
    {

    }
}
