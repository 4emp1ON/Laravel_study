@extends('layouts.index')
@section('content')
    <h1 class="pb-4 mb-4 font-italic border-bottom">
        Новости
    </h1>
    @forelse($newsList['categories'] as $keyCategory => $content)
        <h2>Главные новости категории {{$keyCategory}}</h2>
        @foreach ($content['content'] as $postKey => $post)
            <div class="blog-post">
                <a href="{{ route('news.show', ['id' => $postKey, 'category' => $keyCategory ]) }}"><h3
                        class="blog-post-title">{{ $post['title'] }}</h3></a>
                <p class="blog-post-meta">{!! $post['body'] !!}</p>
            </div>
        @endforeach
    @empty
        <h2>Новостей нет</h2>
    @endforelse
@stop
