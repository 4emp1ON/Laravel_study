@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="wrapper w-50">
            <h2>Редактирование новости</h2>
            <form action="{!! route('news.update', ['news' => $news->id]) !!}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-between flex-wrap">
                    <label for="header">Автор</label>
                    <input id="header" name="author" class="w-75 mb-3" type="text" value="{!! $news->author !!}">
                    @error('author')
                    @foreach($errors->get('author') as $error)
                        <div class="alert alert-danger w-100">{{ $error }}</div>
                    @endforeach
                    @enderror
                    <label for="header">Заголовок новости</label>
                    <input id="header" name="title" class="w-75 mb-3" type="text" value="{!! $news->title !!}">
                    @error('title')
                    @foreach($errors->get('title') as $error)
                        <div class="alert alert-danger w-100">{{ $error }}</div>
                    @endforeach
                    @enderror
                    <label for="body">Текст новости</label>
                    <input id="newsBody" name="body" class="w-75 mb-3" type="textfield" value="{!! $news->body !!}">
                    @error('body')
                    @foreach($errors->get('body') as $error)
                        <div class="alert alert-danger w-100">{{ $error }}</div>
                    @endforeach
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">Отредактировать</button>
            </form>
            <form action=" {{ route("news.destroy", ['news' => $news]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3 w-100">Удалить новость</button>
            </form>
        </div>
    </div>
@endsection
