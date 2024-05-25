<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        return view('users.update');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return view('users.destroy');
    }
}
