<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function oneCategory($id) {
        $categoryNews = (new News())->getByCategory($id);
        return view('categories.category')->with('category', $categoryNews);
    }
}
