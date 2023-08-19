<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Employee;
use App\Models\Vacancy;
use App\Models\VacancyApply;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function shortenText($text, $maxLength = 100, $ellipsis = '...') {
        if (strlen($text) <= $maxLength) {
            return strip_tags($text); // No need to truncate
        }

        return substr($text, 0, $maxLength) . $ellipsis;
    }
    public function index()
    {
        $categories = Category::limit(8)->select('title', 'icon')->get();
        $jobs = Vacancy::with(['employer:id,name,email,address,phone,logo', 'category:id,title'])
                ->orderBy('id','desc')
                ->where('start_date', '<=', now()->toDateString())
                ->where('end_date', '>=', now()->toDateString())
                ->where('status', 1)
                ->limit(10)
                ->get()->map(function($item){
                    $item->short_description = $this->shortenText(strip_tags($item->description), 150);
                    return $item;
                });
        // return $jobs;
        return view('frontend.landing', [
            'categories'    =>  $categories,
            'jobs'    =>  $jobs,
        ]);
    }
    public function jobs(Request $request)
    {
        $jobs = Vacancy::with(['employer'])->latest()->paginate(10)->withQueryString();
        // return $jobs;
        return view('frontend.jobs', compact('jobs'));
    }
    public function jobdetail($id)
    {
        $job = Vacancy::findOrFail($id);
        $job->load(['employer', 'category']);
        $employee = auth()->guard('employee')->user();
        $checkSaveJob = false;
        $checkJobApply = false;
        if(isset($employee->id) && (Bookmark::where('vacancy_id', $job->id)->where('employee_id', $employee->id)->first()))
        {
            $checkSaveJob = true;
        }
        if(isset($employee->id) && (VacancyApply::where('vacancy_id', $job->id)->where('employee_id', $employee->id)->first()))
        {
            $checkJobApply = true;
        }
        return view('frontend.jobdetail', compact('job', 'checkSaveJob', 'checkJobApply'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function freelancer()
    {
        $employees = Employee::latest()->paginate(10)->withQueryString();
        return view('frontend.freelancer', compact('employees'));
    }
    public function freelancerShow($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->load(['detail', 'education', 'experience']);
        return view('frontend.freelancer_detail', compact('employee'));
    }
    public function certification()
    {
        $certification = Certification::latest()->paginate(10)->withQueryString();
        return view('frontend.certification', compact('certification'));
    }
    public function certificationShow($id)
    {
        $certification = Certification::findOrFail($id);
        return view('frontend.certification_detail', compact('certification'));
    }
}
