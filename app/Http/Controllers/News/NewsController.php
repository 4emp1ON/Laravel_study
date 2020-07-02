<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $news = [
        "categories" => [
            "Hi Tech" => [
                'name' => "Hi Tech",
                'content' => [
                    1 => [
                        'title' => 'New processor produced',
                        'body' => 'New processor is much more better then previous and this is great',
                        'author' => 'Ben',
                        'date' => '03.07.2020'
                    ],
                    2 => [
                        'title' => 'New processor produced again',
                        'body' => 'New processor again becomes much more better then previous and this is great',
                        'author' => 'Ben',
                        'date' => '04.07.2020'
                    ]
                ]],
            "Business" => [
                'name' => "Business",
                'content' => [
                    3 => [
                        'title' => 'New business issues',
                        'body' => 'One clever men generate new business issues and it works ',
                        'author' => 'Ben',
                        'date' => '03.07.2020'
                    ],
                    4 => [
                        'title' => 'New! business issues',
                        'body' => 'Another one clever men generate new business issues and it works again',
                        'author' => 'Ben',
                        'date' => '04.07.2020'
                    ]
                ]
            ]]
    ];

    public function index()
    {
        return view('news')->with('news', $this->news);
    }

    public function newsCategories($category)
    {
        return view('newsCategories')->with('news', $this->news['categories'][$category]);
    }

    public function newsOne($category, $id)
    {
        return view('oneNew')->with('news', $this->news['categories'][$category]['content'][$id]);
    }

    public function categories()
    {
        $html = '';
        foreach ($this->news['categories'] as $category) {
            $html .= "<a href='/news/" . $category['name'] . "'><h2>" . $category['name'] . "</h2></a>";
        }
        return $html;
    }

    public function addForm()
    {
        return view('addNews')->with('news', $this->news['categories']);
    }

    public function add()
    {
        $categoryName = \request()->post('categoryName');
        $postTitle = \request()->post('newsHeader');
        $postBody = \request()->post('newsBody');
        array_push($this->news['categories'][$categoryName]['content'], [
            "title" => $postTitle,
            "body" => $postBody,
            "author" => "Ben",
            "date" => date("m.d.Y")
        ]);

        \request()->session()->start();
        \request()->session()->push('news', $this->news);
        return redirect()->route('news.news');
    }
}
