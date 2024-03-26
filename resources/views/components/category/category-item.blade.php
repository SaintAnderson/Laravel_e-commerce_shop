<div class="CategoriesButton-link">
    <a href="{{ route('catalog.category', $category)}}">
        <span class="CategoriesButton-text">{{ $category->name }}</span>
    </a>
    @if ($category->childCategories->isNotEmpty() && !$category->parent_id)
        <a class="CategoriesButton-arrow" href="#"></a>
            <div class="CategoriesButton-submenu">
                @foreach($category->childCategories as $childCategory)
                    @include('components.category.category-item', ['category' => $childCategory])
                @endforeach
            </div>
    @endif
</div>
