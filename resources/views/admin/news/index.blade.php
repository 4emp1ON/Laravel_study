@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <strong id="message">{{ session()->get('success') }}</strong>
    @endif
    <h1>Добро пожаловать в админку.</h1>
    <p><a href="{!! route('news.create') !!}">Добавить новость</a></p>
    <h2>Новости на сайте:</h2>
    @foreach($news as $post)
        <p><a href="{{route('news.edit', ['news' => $post])}}">{!! $post->title !!}</a></p>
    @endforeach

@stop

@section('js')
    <script>
        window.onload = function () {
            if (document.querySelector('#message')) {
                setTimeout(() => {
                        const el = document.querySelector('#message');
                        el.style.transition = '.5s';
                        el.style.opacity = '0';
                    },
                    2000);
            }
        }

        // jQuery(document).ready(function () {
        //     setTimeout(function () {
        //         $('#message').fadeOut('fast')
        //     }, 3000)
        // });
    </script>
@stop
