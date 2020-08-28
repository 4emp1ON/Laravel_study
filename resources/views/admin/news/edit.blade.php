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

                    <label for="header">Заголовок новости</label>
                    <input id="header" name="title" class="w-75 mb-3" type="text" value="{!! $news->title !!}">

                    <label for="body">Текст новости</label>
                    <input id="newsBody" name="body" class="w-75 mb-3" type="textfield" value="{!! $news->body !!}">
                </div>

                <button type="submit" class="btn btn-success">Отредактировать</button>
            </form>
        </div>
    </div>
@endsection
