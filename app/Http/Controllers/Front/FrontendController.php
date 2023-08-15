<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Category;
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
    public function jobs()
    {
        return view('frontend.jobs');
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
        return view('frontend.freelancer');
    }
    public function certification()
    {
        return view('frontend.certification');
    }
}
