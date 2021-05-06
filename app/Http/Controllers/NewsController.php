<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $category = $news->category()->get()[0];
        return view('news.show', compact(['news', 'category']));
    }
}