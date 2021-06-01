<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.index', compact('users'));
    }

    public function put(User $user, Request $request)
    {
        $user->update([
           'is_admin' => !$user->is_admin,
        ]);
        return redirect()->route('admin.users.index');
    }
}
