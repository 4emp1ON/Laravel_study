@extends('layouts.index')
@section('content')
    <div class="add_comments">
        @isset($message)
            <div class="alert alert-success" role="alert">
                {!! $message !!}
            </div>
        @endisset
        <h2 class="p-2">Форма заказа на получение выгрузки данных</h2>
        <form class="needs-validation" novalidate method="POST"
              action="{!!  route('dataLandingForm') !!}">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Имя</label>
                    <input type="text" class="form-control" name="name" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Номер телефона</label>
                    <input type="tel" class="form-control" name="phone" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Email</label>
                    <input type="email" class="form-control" name="email" id="validationCustom03" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Ваш запрос</label>
                    <input type="text" class="form-control" name="message" id="validationCustom04" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Отправить запрос</button>
        </form>
    </div>
@stop

@section('js')
    <script>
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
