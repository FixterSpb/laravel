<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Database\Factories\CategoryFactory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $news = $category->news()->get();
        return view('categories.show', compact(['category', 'news']));
    }

    public function create()
    {
        return $this->index();
    }


}
