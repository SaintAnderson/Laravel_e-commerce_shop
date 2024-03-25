<a class="BannersHomeBlock" href="{{ route('catalog.category', $category)}}">
    <div class="BannersHomeBlock-row">
        <div class="BannersHomeBlock-block">
            <strong class="BannersHomeBlock-title">
                {{$category->name}}
            </strong>
            <div class="BannersHomeBlock-content">from&#32;
                <span class="BannersHomeBlock-price">
                    {{-- {{// todo Минимальная цена в данной категории}}--}}
                </span>
            </div>
        </div>
        <div class="BannersHomeBlock-block">
            <div class="BannersHomeBlock-img"><img src="assets/img/content/home/videoca.png" alt="videoca.png" />
            </div>
        </div>
    </div>
</a>