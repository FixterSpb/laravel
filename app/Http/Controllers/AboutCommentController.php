<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentPutRequest;
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

    public function edit(AboutComment $comment)
    {
        return redirect()->route('about.index')->with('comment', $comment);
    }

    public function destroy(AboutComment $comment, Request $request)
    {
        $comment->delete();
        return redirect($request->header('referer'))->with('success', 'Комментарий удалён');
    }

    public function put(AboutComment $comment, CommentPutRequest $request)
    {
        $comment->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        return redirect()->route('about.index')->with('success', 'Комментарий успешно изменён');
    }
}
