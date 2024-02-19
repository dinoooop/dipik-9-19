<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $validated['password'] = Hash::make('welcome');
        
        $merged = array_merge($validated, $request->all());
        $user = User::create($merged);
        return redirect('/admin/users');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $merged = array_merge($validated, $request->all());

        $user = User::find($id)->update($merged);
        return redirect('/admin/users/' . $id . '/edit');
    }
}
