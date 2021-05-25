<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\AboutComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCommentController extends Controller
{
    public function store(CommentStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        (new AboutComment([
                'name' => $request->request->get('name'),
                'description' => $request->request->get('description'),
        ]))->save();
        return redirect()->route('about.index')->with('success', 'Комментарий успешно добавлен!');
    }
}
