<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{

    private const FILE_ABOUT_COMMENT_NAME = 'about-comments.txt';

    public function index()
    {
        $comments = [];
        if (Storage::exists(self::FILE_ABOUT_COMMENT_NAME)){
            $comments = json_decode(Storage::disk('local')->get(self::FILE_ABOUT_COMMENT_NAME));
        }
        return view('about.index', compact('comments'));
    }
}
