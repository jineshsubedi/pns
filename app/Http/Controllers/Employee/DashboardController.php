<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExmployeeEducationRequest;
use App\Http\Requests\ExmployeeExperienceRequest;
use App\Models\Bookmark;
use App\Models\Employee;
use App\Models\EmployeeDetail;
use App\Models\EmployeeEducation;
use App\Models\EmployeeExperience;
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
        $skills = $me->detail ? ($me->detail->skills ? explode(',', $me->detail->skills) : []) : [];
        return view('employee.dashboard', compact('me', 'skills'));
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

    public function profile()
    {
        $user = auth()->guard('employee')->user();
        $user->load(['detail', 'education', 'experience']);
        return view('employee.profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'bio' => 'required|max:300',
            'gender' => 'sometimes',
            'marital_status' => 'sometimes',
            'skills' => 'required',
        ]);
        $user = auth()->guard('employee')->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        EmployeeDetail::updateOrCreate(['employee_id' => $user->id],[
            'employee_id' => $user->id,
            'bio'   => $request->bio,
            'designation'   => $request->designation,
            'dob'   => $request->dob,
            'gender'   => $request->gender,
            'marital_status'   => $request->marital_status,
            'skills'   => $request->skills,
        ]);
        return redirect()->route('employee.dashboard');
    }

    public function saveExperience(ExmployeeExperienceRequest $request)
    {
        $user = auth()->guard('employee')->user();
        $data = array_merge(
            [
                'employee_id' => $user->id
            ], $request->validated()
        );
        // return $data;
        EmployeeExperience::insert($data);
        return back()->with('success', 'Experience Added');
    }
    public function deleteExperience($id)
    {
        $user = auth()->guard('employee')->user();
        $exp = EmployeeExperience::findOrFail($id);
        if (!isset($exp->id)) {
            return back()->with('danger', 'Not Found');
        }
        if ($user->id !== $exp->employee_id) {
            return back()->with('danger', 'Not Authorized');
        }
        $exp->delete();
        return back()->with('success', 'Experience deleted');
    }
    public function saveEducation(ExmployeeEducationRequest $request)
    {
        $user = auth()->guard('employee')->user();
        EmployeeEducation::create($request->validated() +
        [
            'employee_id' => $user->id
        ]);
        return back()->with('success', 'Education Added');
    }
    public function deleteEducation($id)
    {
        $user = auth()->guard('employee')->user();
        $exp = EmployeeEducation::findOrFail($id);
        if (!isset($exp->id)) {
            return back()->with('danger', 'Not Found');
        }
        if ($user->id !== $exp->employee_id) {
            return back()->with('danger', 'Not Authorized');
        }
        $exp->delete();
        return back()->with('success', 'Education deleted');
    }
}
