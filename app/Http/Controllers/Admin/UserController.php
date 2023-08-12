<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-user', ['only' => ['store', 'create']]);
        $this->middleware('permission:update-user',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-user',   ['only' => ['destroy']]);
        $this->middleware('permission:read-user',   ['only' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles:id,name')->orderBy('name')->paginate(20)->withQueryString();
        return view('Admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('Admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::create($request->validated() + [
            'password' => bcrypt($request->password),
        ]);
        foreach ($request->roles as $role) {
            $user->assignRole([$role]);
        }
        return redirect()->route('admin.users.index')->with('success', 'User Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::all();
        $userRoles = $user->roles()->pluck('name')->toArray();
        return view('Admin.user.edit', compact('roles', 'user', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update(\Arr::except($request->validated(), 'password') + [
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
        ]);
        $user->syncRoles($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with('success', 'User Deleted Successfully!');
    }
}
