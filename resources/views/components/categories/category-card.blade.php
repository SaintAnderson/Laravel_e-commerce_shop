<a class="BannersHomeBlock" href="#">
    <div class="BannersHomeBlock-row">
        <div class="BannersHomeBlock-block">
            <strong class="BannersHomeBlock-title">
                {{$category->name}}
            </strong>
            <div class="BannersHomeBlock-content">from&#32;
                <span class="BannersHomeBlock-price">
{{--                    {{// todo Минимальная цена в данной категории}}--}}
                </span>
            </div>
        </div>
        <div class="BannersHomeBlock-block">
            <div class="BannersHomeBlock-img">
                <img src="{{ asset($category->image_url) }}" alt=""/>
            </div>
        </div>
    </div>
</a>
