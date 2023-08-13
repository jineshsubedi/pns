<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AppConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\VacancyRequest;
use App\Library\Imagetool;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    public function index(Request $request)
    {
        $data['status'] = AppConstant::REQUIRED;
        $query = Vacancy::query();
        $filter = $this->filterQuery($query);
        $jobs = $filter->orderBy('id', 'desc')
            ->paginate(config('app.settings')->item_perpage ?? 20)
            ->withQueryString();

        $filters = request()->only(['title', 'code', 'status']);
        return view('Admin.jobs.index', [
            'jobs' => $jobs,
            'filters' => $filters,
            'data' => $data
        ]);
    }
    public function create()
    {
        $data['status'] = AppConstant::REQUIRED;
        $data['type'] = AppConstant::TYPE;
        $categories = Category::orderBy('title')->get();
        $employers = Employer::orderBy('name')->select('id', 'name')->get();
        return view('Admin.jobs.create', compact('categories', 'data', 'employers'));
    }
    public function store(VacancyRequest $request)
    {
        $code = $this->generateCode(request('title'));
        $logo = '';
        if($request->hasFile('logoFile'))
        {
            $file = $request->file('logoFile');
            $logo = 'employer/jobs/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);
        }
        Vacancy::create($request->validated() + [
            'code' => $code,
            'image' => $logo
        ]);
        return redirect()->route('admin.jobs.index')->with('success', 'Job Created Successfully');
    }
    public function generateCode($title)
    {
        $words = explode(' ', $title);
        $code = '';
        foreach ($words as $word) {
            $code .= strtoupper(substr($word, 0, 1));
        }
        $timestamp = now()->format('ymdis');
        // You might want to make sure the code is unique
        // and handle any duplicates or collisions here.
        return $code. $timestamp;
    }

    public function edit($id)
    {
        $job = Vacancy::findOrFail($id);
        $data['status'] = AppConstant::REQUIRED;
        $data['type'] = AppConstant::TYPE;
        $categories = Category::orderBy('title')->get();
        $employers = Employer::orderBy('name')->select('id', 'name')->get();
        return view('Admin.jobs.edit', compact('job', 'categories', 'data', 'employers'));
    }
    public function update(VacancyRequest $request, $id)
    {
        $job = Vacancy::findOrFail($id);
        $code = $this->generateCode(request('title'));
        $logo = $job->image;
        if($request->hasFile('logoFile'))
        {
            $file = $request->file('logoFile');
            $logo = 'employer/jobs/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);
        }
        $job->update($request->validated() + [
            'code' => $code,
            'image' => $logo
        ]);
        return redirect()->route('admin.jobs.index')->with('success', 'Job Updated Successfully');
    }
    public function destroy($id): RedirectResponse
    {
        Vacancy::findOrFail($id)->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Jobs Deleted Successfully');
    }
    private function filterQuery($query)
    {
        if (request()->filled('title')) {
            $query->where('title', 'LIKE', '%' . request()->title . '%');
        }
        if (request()->filled('code')) {
            $query->where('code', 'LIKE', '%' . request()->code . '%');
        }
        if (request()->filled('status')) {
            $query->where('status', request()->status);
        }
        return $query;
    }
}
