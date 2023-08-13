<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AppConstant;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-employee', ['only' => ['store', 'create']]);
        $this->middleware('permission:update-employee',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-employee',   ['only' => ['destroy']]);
        $this->middleware('permission:read-employee',   ['only' => ['show', 'index']]);
    }
    public function index()
    {
        $data['status'] = AppConstant::REQUIRED;
        $query = Employee::query();
        $filter = $this->filterQuery($query);
        $employees = $filter->orderBy('id', 'desc')
            ->paginate(config('app.settings')->item_perpage ?? 20)
            ->withQueryString();

        $filters = request()->only(['name', 'email', 'status']);
        return view('Admin.employee.index', compact('employees', 'data', 'filters'));
    }
    public function edit(Employee $employee)
    {
        if($employee->status == 1)
        {
            $status = 0;
            $message = 'Employee Disabled Successfully';
        }else{
            $status = 1;
            $message = 'Employee Enabled Successfully';
        }
        $employee->update([
            'status' => $status
        ]);
        return back()->with('success', $message);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('Employee Deleted Successfully');
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
