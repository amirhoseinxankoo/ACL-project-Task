<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Auth\Access\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        $permissions = Permission::all();
        $user = auth()->user();
        if ($user->id === 1) {
            return view('page.admin', compact('users', 'permissions'));
        } elseif ($user->status == 'admin') {

            return view('page.admin', compact('users', 'permissions'));
        } else {
            return view('page.user', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $user = User::find($id);
        return view('admin.editUser', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $per = Permission::find($request->permission);

        if ($user->permissions()->count() == 0) {
            $user->permissions()->sync($request->permission);
            return redirect()->route('user.index');
        }
        foreach ($user->permissions  as $permission) {
            $count = 0;

            if ($permission->name == $per->name) {
                $count = $count + 1;
            }
            if ($count >= 1) {
                return redirect()->route('user.index')->withErrors('permission is set');
            } else {
                $user->permissions()->sync($request->permission);
                return redirect()->route('user.index');
            }
        }




        // Gate::allows($permission->name , $user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
