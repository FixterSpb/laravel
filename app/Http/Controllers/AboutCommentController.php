<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCommentController extends Controller
{
    public function store(CommentStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $commentItem = [
            'name' => $request->request->get('name'),
            'description' => $request->request->get('description'),
            'created_at' => now()
        ];

        $comments = [];
        if (Storage::exists(FILE_ABOUT_COMMENT_NAME)){
            $comments = json_decode(Storage::disk('local')->get(FILE_ABOUT_COMMENT_NAME));
        }

        $comments[] = $commentItem;

        Storage::put(FILE_ABOUT_COMMENT_NAME, json_encode($comments));
        return redirect()->route('about.index')->with('success', 'Комментарий успешно добавлен!');
    }
}
