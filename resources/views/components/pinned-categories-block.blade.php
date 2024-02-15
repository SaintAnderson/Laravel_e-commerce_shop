<div class="Section">
    <div class="wrap">
        <div class="BannersHome">
            @foreach($pinnedCategories as $category)
                @include('components.categories.category-card', ['category' => $category])
            @endforeach
        </div>
    </div>
</div>
