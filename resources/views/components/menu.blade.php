<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-start">
        @isset($categories)
        @foreach($categories as $category)
            <a class="p-2 text-muted" href="#">{!! $category !!}</a>
        @endforeach
        @endisset

            <a class="p-2 text-muted" href="/dataLandingForm">Форма (дз4)</a>
    </nav>
</div>
</div>
