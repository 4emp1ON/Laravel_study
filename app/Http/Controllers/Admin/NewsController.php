<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $data = $request->validated();
        $news = News::create($data);
        if ($news) {
            return redirect()->route('news.index')->with('success', trans('messages.admin.news.store.success'));
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCreateRequest $request, News $news)
    {
        $news->author = $request->input('author');
        $news->title = $request->input('title');
        $news->body = $request->input('body');

        if($news->save()) {
            return redirect()->route('news.index')->with('success', __('messages.admin.news.update.success'));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        if(!\request()->isMethod('DELETE')){
            return redirect()->route('news.index')->with('success', __('messages.admin.news.delete.wrong_method'));
        }
        if ($news->delete()) {
            return redirect()->route('news.index')->with('success', __('messages.admin.news.delete.success'));
        }
        dd($news);
    }
}
