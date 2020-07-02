@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <h1>{{ $news['title'] }}</h1>
        <div>
            <p>{{ $news['body'] }}</p>
            <p>Author: {{$news['author']}}</p>
            <p>Date: {{$news['date']}}</p>
        </div>
    </div>
    </div>
@endsection
