@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="wrapper w-50">
            <h2>Добавление новости</h2>
            <form action="{!! route('news.store') !!}" method="POST">
                @csrf
                <div class="d-flex justify-content-between flex-wrap">
                    <label for="header">Автор</label>
                    <input id="authorName" name="author" class="w-75 mb-3" type="text" value="{!! old('author') !!}">
                    @error('author')
                    @foreach($errors->get('author') as $error)
                        <div class="alert alert-danger w-100">{{ $error }}</div>
                    @endforeach
                    @enderror
                    <label for="header">Заголовок новости</label>
                    <input id="newsTitle" name="title" class="w-75 mb-3" type="text" value="{!! old('title') !!}">
                    @error('title')
                    @foreach($errors->get('title') as $error)
                        <div class="alert alert-danger w-100">{{ $error }}</div>
                    @endforeach
                    @enderror
                    <label for="body">Текст новости</label>
                    <input id="newsBody" name="body" class="w-75 mb-3" type="textfield" value="{!! old('body') !!}">
                    @error('body')
                    @foreach($errors->get('body') as $error)
                        <div class="alert alert-danger w-100">{{ $error }}</div>
                    @endforeach
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Опубликовать</button>
            </form>
        </div>
    </div>
@endsection
