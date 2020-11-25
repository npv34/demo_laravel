<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    function create()
    {
        $groups = Group::all();
        $roles = Role::all();
        return view('admin.users.create', compact('groups', 'roles'));
    }

    function store(CreateUserRequest $request) {
        // create user
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->save();
        //tao role cho nguoi dung
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    function delete($id) {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
