<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AppConstant;
use App\Http\Controllers\Controller;
use App\Library\Imagetool;
use App\Models\Employer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use View;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-employer', ['only' => ['store', 'create']]);
        $this->middleware('permission:update-employer',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-employer',   ['only' => ['destroy']]);
        $this->middleware('permission:read-employer',   ['only' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['status'] = AppConstant::REQUIRED;
        $query = Employer::query();
        $filter = $this->filterQuery($query);
        $employers = $filter->orderBy('id', 'desc')
            ->paginate(config('app.settings')->item_perpage ?? 20)
            ->withQueryString();

        $filters = request()->only(['name', 'email', 'status']);
        return view('Admin.employer.index', [
            'employers' => $employers,
            'filters' => $filters,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['status'] = AppConstant::REQUIRED;
        return view('Admin.employer.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'sometimes|nullable|max:100',
            'phone' => 'sometimes|nullable',
            'password' => 'required',
            'status' => 'required|in:0,1',
            'logoFile' => 'sometimes|nullable|mimes:jpg,png,jpeg,gif|max:4056',
            'description' => 'sometimes|nullable|max:500',
        ]);
        $logo = '';
        if($request->hasFile('logoFile'))
        {
            $file = $request->file('logoFile');
            $logo = 'employer/logo/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);
        }
        Employer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'description' => $request->description,
            'logo' => $logo
        ]);
        return redirect()->route('admin.employers.index')->with('Employer Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        $data['status'] = AppConstant::REQUIRED;
        return view('Admin.employer.edit', compact('data', 'employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'sometimes|nullable|max:100',
            'phone' => 'sometimes|nullable',
            'password' => 'sometimes',
            'status' => 'required|in:0,1',
            'logoFile' => 'sometimes|nullable|mimes:jpg,png,jpeg,gif|max:4056',
            'description' => 'sometimes|nullable|max:500',
        ]);
        $password = $request->password ? bcrypt($request->password) : $employer->password;
        $logo = $employer->logo;
        if($request->hasFile('logoFile'))
        {
            $file = $request->file('logoFile');
            $logo = 'employer/logo/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);
        }
        $employer->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'password' => $password,
            'logo' => $logo
        ]);
        return redirect()->route('admin.employers.index')->with('Employer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer): RedirectResponse
    {
        $employer->delete();
        return redirect()->route('admin.employers.index')->with('Employer Deleted Successfully');
    }
    private function filterQuery($query)
    {
        if (request()->filled('name')) {
            $query->where('name', 'LIKE', '%' . request()->name . '%');
        }
        if (request()->filled('email')) {
            $query->where('email', request()->email);
        }
        if (request()->filled('status')) {
            $query->where('status', request()->status);
        }
        return $query;
    }
}
