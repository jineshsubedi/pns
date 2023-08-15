<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Employee;
use App\Models\Vacancy;
use App\Models\VacancyApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $me = Employee::findOrFail(auth()->guard('employee')->user()->id);
        $me->load(['detail']);
        return view('employee.dashboard', compact('me'));
    }

    public function bookmarked()
    {
        $user = auth()->guard('employee')->user();
        $myjobs = Bookmark::where('employee_id', $user->id)->with(['vacancy'])->paginate(10)->withQueryString();
        return view('employee.bookmarked', compact('myjobs'));
    }
    public function jobs()
    {
        $user = auth()->guard('employee')->user();
        $myjobs = VacancyApply::where('employee_id', $user->id)->with(['vacancy'])->paginate(10)->withQueryString();
        return view('employee.jobs', compact('myjobs'));
    }
    public function tooglebookmarked($id)
    {
        $user = auth()->guard('employee')->user();
        $vacancy = Vacancy::findOrFail($id);
        $bookmark = Bookmark::where('employee_id', $user->id)->where('vacancy_id', $vacancy->id)->first();
        if(isset($bookmark->id))
        {
            $bookmark->delete();
            return back()->with('success', 'Job Removed From Bookmark');
        }
        Bookmark::create([
            'employee_id' => $user->id,
            'vacancy_id'    => $vacancy->id
        ]);
        return back()->with('success', 'Job Added to Bookmark');
    }
    public function apply($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $user = auth()->guard('employee')->user();
        VacancyApply::create([
            'employee_id' => $user->id,
            'vacancy_id'    => $vacancy->id,
            'status'    => 'Pending'
        ]);
        return back()->with('success', 'Job Applied Successfully');
    }
    public function change_password()
    {
        return view('employee.change_password');
    }
    public function save_change_password(Request $request)
    {
        $user = auth()->guard('employee')->user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('employee.dashboard')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->withErrors(['old_password' => 'Incorrect current password.']);
        }
    }
}
