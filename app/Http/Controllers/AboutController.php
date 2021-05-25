<?php

namespace App\Http\Controllers;

use App\Models\AboutComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $comments = AboutComment::all();

        return view('about.index', compact('comments'));
    }
}
