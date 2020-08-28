<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category) {
        $news = $category->news;
//        dd($news);
        return view('categories.show')->with('category', $category);
    }
}
