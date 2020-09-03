<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::paginate(5);
        return view('news.index')->with([
            'news' => $news
        ]);
    }

    public function show($id)
    {
        $news = News::find($id);
        $category = request()->input('category');
        return view('news.oneNew')->with([
            'news' => $news,
            'comments' => $this->getComments($id),
        ]);
    }

    public function addForm()
    {
        return view('addNews');
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
