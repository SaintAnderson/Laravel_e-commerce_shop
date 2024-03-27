@extends('layouts.default')

@section('content')
    @include('components.slider', $banners)

    <div class="Middle">
        @include('components.pinned-categories-block')
        <div class="Section">
            <div class="wrap">
                <div class="Section-content">
                    <header class="Section-header">
                        <h2 class="Section-title">
                            Популярные товары
                        </h2>
                    </header>
                    @include('components.popular-products-block', $popularProducts)
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section_column Section_columnRight">
        <div class="wrap">
            <div class="Section-column">
                @include('components.advantages')
            </div>
            @include('components.products.limited-edition-products-slider', ['products' => $limitedEditionProducts])
        </div>
    </div>
    </div>
@endsection
