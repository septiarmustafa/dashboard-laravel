<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
     {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
         return view('users.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'role' => 'required',
            'status' => 'required|boolean',
            'date' => 'required|date',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

      public function edit(Users $user)
    {
        return view('users.edit', compact('user'));
    }


   public function update(Request $request, Users $users)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'status' => 'required|boolean',
            'date' => 'required|date',
        ]);

        $users->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(Users $users)
    {
        $users->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
