<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCommentController extends Controller
{
    private const FILE_ABOUT_COMMENT_NAME = 'about-comments.txt';

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $commentItem = [
            'name' => $request->request->get('name'),
            'description' => $request->request->get('description'),
            'time' => now()
        ];
//            Storage::put('about-comments.txt')
        $comments = [];
        if (Storage::exists(self::FILE_ABOUT_COMMENT_NAME)){
            $comments = json_decode(Storage::disk('local')->get(self::FILE_ABOUT_COMMENT_NAME));
        }

        $comments[] = $commentItem;

        Storage::put(self::FILE_ABOUT_COMMENT_NAME, json_encode($comments));
        return redirect()->route('about.index');
    }
}
