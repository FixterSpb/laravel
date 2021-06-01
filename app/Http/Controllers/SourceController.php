<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index(Request $request)
    {
        $user = \Auth::getUser();
        return view('orders', compact('user'));
    }
}
