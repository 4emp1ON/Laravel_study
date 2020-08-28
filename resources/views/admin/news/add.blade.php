@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="wrapper w-50">
            <h2>Добавление новости</h2>
            <form action="{!! route('news.store') !!}" method="POST">
                @csrf
                <div class="d-flex justify-content-between flex-wrap">
                    <label for="header">Автор</label>
                    <input id="header" name="author" class="w-75 mb-3" type="text" value="{!! old('author') !!}">

                    <label for="header">Заголовок новости</label>
                    <input id="header" name="title" class="w-75 mb-3" type="text" value="{!! old('title') !!}">

                    <label for="body">Текст новости</label>
                    <input id="newsBody" name="body"class="w-75 mb-3"  type="textfield" value="{!! old('body') !!}">
                </div>

                <button type="submit" class="btn btn-success">Опубликовать</button>
            </form>
        </div>
    </div>
@endsection
