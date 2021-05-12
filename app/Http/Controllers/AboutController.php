<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $comments = [];
        if (Storage::exists(FILE_ABOUT_COMMENT_NAME)){
            $comments = json_decode(Storage::get(FILE_ABOUT_COMMENT_NAME));
        }
        return view('about.index', compact('comments'));
    }
}
