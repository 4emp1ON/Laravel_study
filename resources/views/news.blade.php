@extends('layouts.app')

@section('content')
    <?php $sessionNews = request()->session()->get("news")[0];
    ?>
    <div class="container-xl d-flex flex-column">

        @foreach ($sessionNews['categories'] as $category)

                <div class="d-flex flex-row mb-3">

                    <h1 class="w-100">{{ $category['name'] }}</h1>

                    @foreach ($category['content'] as $item)

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
        @endforeach
    </div>
@endsection
