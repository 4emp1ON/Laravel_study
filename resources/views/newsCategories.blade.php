@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <h1>Новости категории {{$news['name']}}</h1>
        <div class="d-flex flex-row justify-content-around">
        @foreach($news['content'] as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['title']}}</h5>
                    <p class="card-text">{{ $item['body'] }}</p>
                    <p class="card-text">Author: {{ $item['author'] }}</p>
                    <p class="card-text">Published: {{ $item['date'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
