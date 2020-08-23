<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach(getCategories() as $category)
            <a class="p-2 text-muted" href="{{ route("categories.category", ['id' => $category->id]) }}">{!! ucfirst($category->name)  !!}</a>
        @endforeach

            <a class="p-2 text-muted" href="/dataLandingForm">Форма (дз4)</a>
    </nav>
</div>
</div>
