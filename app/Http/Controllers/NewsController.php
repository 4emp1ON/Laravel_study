<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $newsList = [
        "categories" => [
            "Hi Tech" => [
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
        return view('news.index')->with([
            'newsList' => $this->newsList,
            'categories' => array_keys($this->newsList['categories'])]);
    }

    public function newsCategories($category)
    {
        return view('newsCategories')->with('news', $this->newsList['categories'][$category]);
    }

    public function show($id)
    {
        $category = request()->input('category');
        return view('news.oneNew')->with([
            'id' => $id,
            'news' => $this->newsList['categories'][$category]['content'][$id],
            'categories' => array_keys($this->newsList['categories']),
            'comments' => $this->getComments($id),
        ]);
    }

    public function categories()
    {
        $html = '';
        foreach ($this->newsList['categories'] as $category) {
            $html .= "<a href='/news/" . $category['name'] . "'><h2>" . $category['name'] . "</h2></a>";
        }
        return $html;
    }

    public function addForm()
    {
        return view('addNews')->with('news', $this->newsList['categories']);
    }

    public function add()
    {
        $categoryName = \request()->post('categoryName');
        $postTitle = \request()->post('newsHeader');
        $postBody = \request()->post('newsBody');
        array_push($this->newsList['categories'][$categoryName]['content'], [
            "title" => $postTitle,
            "body" => $postBody,
            "author" => "Ben",
            "date" => date("m.d.Y")
        ]);

        \request()->session()->start();
        \request()->session()->push('news', $this->newsList);
        return redirect()->route('news.news');
    }

    public function getComments($id)
    {
        $fileComments = storage_path('app/comments.json');
        if (file_exists($fileComments)) {
            $commentsSource = file_get_contents($fileComments);
            $comments = json_decode($commentsSource, true);
            $currentPostComments = $comments[$id] ?? '';
        }
        return response()->json($currentPostComments ?? '');
    }

    public function addComment(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $fileComments = storage_path('app/comments.json');
            $commentsSource = file_get_contents($fileComments);
            $comments = json_decode($commentsSource, true);
            if (array_key_exists($id, $comments)) {
                $lastPostId = end($comments[$id])['id'];
            }
            else {
                $lastPostId = 0;
                $comments[$id] = [];
            }

            $newComment = [
                'id' => $lastPostId + 1,
                'author' => $request->input('author'),
                'date' => date("d.m.Y"),
                'content' => $request->input('comment'),
            ];
            array_push($comments[$id], $newComment);
            $jsonData = json_encode($comments);
            file_put_contents($fileComments, $jsonData);

        } else {
            $request->flash(['message' => 'ONLY GET METHOD']);
        }
        return back()->withInput();
    }
}
