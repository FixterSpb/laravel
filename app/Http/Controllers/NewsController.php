<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $category = $news->category()->get()[0];
        return view('news.show', compact(['news', 'category']));
    }

    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('news.create', compact('categories', 'sources'));
    }

    public function store(NewsStoreRequest $request): RedirectResponse
    {
        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена!');
    }
}
