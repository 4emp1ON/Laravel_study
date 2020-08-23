@extends('layouts.index')

@section('content')
    <div class="blog-post">

        <h1>{{ ucfirst($news->title) }}</h1>
        <div>
            <p>{{ $news->body }}</p>
            <p>Author: {{$news->author}}</p>
            <p>Date: 12.05.2020</p>
        </div>
    </div>
    <div id="comments">
        <h1>Комментарии</h1>
    </div>
    <div class="add_comments">
        <h2 class="p-2">Добавить комментарий</h2>
        <form class="needs-validation" novalidate method="POST"
              action="{!!  route('news.addComment', ['id' => $news->id]) !!}">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Имя</label>
                    <input type="text" class="form-control" name="author" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Ваш комментарий</label>
                    <input type="text" class="form-control" name="comment" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>
@stop

@section('js')
    <script async>
        function getComments(id) {
            let comments;
            const commentsBlock = document.querySelector('#comments');
            fetch(`http://homestead.test/news/${id}/getComments`)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    comments = data;
                    const html = generateCommentsHTML(comments);
                    commentsBlock.insertAdjacentHTML('beforeend', html);
                });
        }

        function generateCommentsHTML(comments) {
            let html = '';
            comments.forEach(comment => {
                html +=
                    `<div class="media">
                          <img src="https://via.placeholder.com/64.png" class="mr-3" alt="...">
                          <div class="media-body">
                            <h5 class="mt-0">Автор: ${comment.author}</h5>
                            <p>${comment.date}</p>
                            <p>${comment.content}</p>
                          </div>
                        </div>`
            })
            return html;
        }

        getComments({!! $news->id !!});


        // Form validation via bootstrap
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@stop
