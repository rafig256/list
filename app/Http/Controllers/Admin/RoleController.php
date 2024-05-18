<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:access management index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');

        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|unique:roles,name',
            'permissions' => 'required'
        ]);

        $role = Role::create(['name' => $request->role]);
        $role->syncPermissions($request->permissions);

        toastr()->success('Role created successfully!');

        return to_route('admin.role.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
//        dd($rolePermissions);
        $permissions = Permission::all()->groupBy('group_name');
        return view('admin.role.edit' ,compact('role' , 'permissions' , 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required|string|unique:roles,name',
            'permissions' => 'required'
        ]);

        if ($role->name == 'Super Admin'){
            abort(403,'You cannot edit this user!');
        }
        $role->update(['name' => $request->role]);
        $role->syncPermissions($request->permissions);

        toastr()->success('Role updated successfully!');

        return to_route('admin.role.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->name == 'Super Admin'){
            abort(403,'You cannot delete this user!');
        }
        $role->delete();

        toastr()->success('Role deleted successfully!');

        return to_route('admin.role.index');
    }
}
