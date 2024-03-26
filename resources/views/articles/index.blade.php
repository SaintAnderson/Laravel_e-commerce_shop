@extends('layouts.default')

@section('content')
<div class="Middle Middle_top">
    <div class="Middle-top">
        <div class="wrap">
            <div class="Middle-header">
                <h1 class="Middle-title">Блог
                </h1>
                <ul class="breadcrumbs Middle-breadcrumbs">
                    <li class="breadcrumbs-item"><a href="{{route('home')}}">Главая</a>
                    </li>
                    <li class="breadcrumbs-item breadcrumbs-item_current"><span>блог</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section">
        <div class="wrap">
            <div class="Cards Cards_blog">

                @foreach($articles as $article)
                    @include('components.articles.article-card', ['article' => $article])
                @endforeach

            </div>
            {{$articles->links()}}
        </div>
    </div>
    @endsection('content')