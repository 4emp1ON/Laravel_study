@extends('layouts.index')
@section('content')
    <h1 class="pb-4 mb-4 font-italic border-bottom">
        Новости
    </h1>
    @forelse($news as $post)
        <div class="blog-post">
            <a href="{{ route('news', ['id' => $post->id]) }}">
                <h3 class="blog-post-title">{{ $post->title}}</h3></a>
            <p>author: {!! $post->author !!}</p>
            <p class="blog-post-meta">{!! $post->body !!}</p>
        </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
    <div class="row">
        {{ $news->links() }}
    </div>
@stop
