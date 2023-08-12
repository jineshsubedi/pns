<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-role', ['only' => ['store', 'create']]);
        $this->middleware('permission:update-role',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-role',   ['only' => ['destroy']]);
        $this->middleware('permission:read-role',   ['only' => ['show', 'index']]);
    }

    public function index()
    {
        $roles = Role::latest()->paginate(30)->withQueryString();
        return view('Admin.role.index', compact('roles')); 
    }
    public function create()
    {
        return view('Admin.role.create'); 
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title.*' => ['required', 'unique:roles,name'],
        ])->validate();
        foreach ($request->title as $title) {
            Role::create(['name' => $title]);
        }
        return redirect()->route('admin.roles.index')->with('success', 'Roles Saved Successfully');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('Admin.role.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'unique:roles,name,'.$role->id.',id'],
        ])->validate();
   
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permission);
        return redirect()->route('admin.roles.index')->with('success', 'Roles Updated Successfully');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Roles Deleted Successfully');
    }
}
