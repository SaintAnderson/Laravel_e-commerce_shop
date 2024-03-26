<a class="BannersHomeBlock" href="{{ route('catalog.category', $category)}}">
    <div class="BannersHomeBlock-row">
        <div class="BannersHomeBlock-block">
            <strong class="BannersHomeBlock-title">
                {{$category->name}}
            </strong>
        </div>
        <div class="BannersHomeBlock-block">
            <div class="BannersHomeBlock-img">
                <img src="{{ $category->image_url }}" alt=""/>
            </div>
        </div>
    </div>
</a>
