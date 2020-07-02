@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="wrapper w-50">
            <form action="/news/addAction" method="POST">
                @csrf
                <label for="catName">Название категории</label>
                <select id="catName" class="form-control form-control-lg" name="categoryName">
                    @foreach($news as $new)
                        <option>{{$new['name']}}</option>
                    @endforeach
                </select>
                <label for="header">Заголовок новости</label>
                <input id="header" type="text" name="newsHeader">

                <label for="body">Текст новости</label>
                <input id="newsBody" type="textfield" name="newsBody">
                <button type="submit" class="btn btn-success">Опубликовать</button>
            </form>
        </div>
    </div>
@endsection
