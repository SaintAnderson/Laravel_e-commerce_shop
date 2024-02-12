<div class="Header-slider">
    <div class="Slider Slider_main">
        <div class="Slider-box">
            @foreach($banners as $banner)
                <div class="Slider-item">
                    <div class="Slider-content">
                        <div class="row">
                            <div class="row-block">
                                <strong class="Slider-title">{{ $banner->title }}<span class="text_primary"></span>
                                </strong>
                                <div class="Slider-text">{{ $banner->description }}
                                </div>
                                <div class="Slider-footer"><a class="btn btn_primary" href="{{ $banner->url }}">Перейти</a>
                                </div>
                            </div>
                            <div class="row-block">
                                <div class="Slider-img"><img src="{{ $banner->image_url }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="Slider-navigateWrap">
            <div class="Slider-navigate">
            </div>
        </div>
    </div>
</div>
