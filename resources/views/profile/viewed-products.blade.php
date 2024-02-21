@extends('layouts.account.default')
@section('name', 'История просмотров')
@section('account-content')
    <div class="Cards Cards_account">
        @foreach($viewedProducts as $viewedProduct)
            @include('components.products.product-card', ['product' => $viewedProduct->product])
        @endforeach
    </div>
@endsection
