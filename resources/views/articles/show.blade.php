@extends('layouts.default')

@section('content')
<div class="Middle Middle_top">
    <div class="Middle-top">
        <div class="wrap">
            <div class="Middle-header">
                @if(strlen($article->title) <= 40) <h1 class="Middle-title"> {{$article->title}}
                    </h1>
                    @else
                    <h1 class="Middle-title"> {{ substr($article->title,0,40)."..." }}
                    </h1>
                    @endif

                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{route('home')}}">Главая</a>
                        </li>
                        @if(mb_strlen($article->title) <= 40) <li class="breadcrumbs-item breadcrumbs-item_current"><span>{{$article->title}}</span>
                            </li>
                            @else
                            <li class="breadcrumbs-item breadcrumbs-item_current">
                                <span>{{substr($article->title,0,40)."..."}}</span>
                            </li>
                            @endif
                    </ul>
            </div>
        </div>
    </div>

    <div class="Section Section_column Section_columnWide">
        <div class="wrap">
            <div class="Section-content">
                <article class="Article">
                    <div class="Article-section">
                        <div class="row row_maxHalf">
                            <div class="row-block">
                                <div class="pict"><img src="{{$article->image_url}}" alt="slider.png">
                                </div>
                            </div>
                            <div class="row-block">
                                <h2>{{$article->title}}
                                </h2>
                                <div>{{$article->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
