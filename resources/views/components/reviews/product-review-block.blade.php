<div class="Tabs-block" id="reviews">
    <header class="Section-header">
        <h3 class="Section-title">
            Отзывы ({{ $reviewCount }})
        </h3>
    </header>

    @if ($reviews->isEmpty())
        <p>Пока нет отзывов о товаре.</p>
    @else
        <div class="Comments">
            @foreach ($reviews as $review)
                <div class="Comment">
                    <div class="Comment-column Comment-column_pict">
                        <div class="Comment-avatar"></div>
                    </div>
                    <div class="Comment-column">
                        <header class="Comment-header">
                            <div>
                                <strong class="Comment-title">{{ $review->user->first_name }}</strong>
                                <span class="Comment-date">{{ $review->created_at }}</span>
                            </div>
                            <div class="Rating">
                                @for ($i = 1; $i <= $review->rating; $i++)
                                    <span class="star" data-rating="{{ $i }}">&#9733;</span>
                                @endfor
                            </div>
                        </header>
                        <div class="Comment-content">
                            {{ $review->comment }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @auth()
        <header class="Section-header Section-header_product">
            <h3 class="Section-title">Добавить отзыв</h3>
        </header>
        @include('components.reviews.product-review-form')
    @else()
        <p>Чтобы оставить отзыв, пожалуйста, <a href="{{ route('login') }}">войдите</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>.</p>
    @endauth
</div>
