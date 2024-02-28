@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="Tabs-addComment">
    <form class="form" action="{{ route('reviews.store', ['slug' => $product->slug]) }}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="rating" id="rating" value="0">
            <div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <textarea class="form-textarea" name="comment" id="comment" placeholder="Отзыв"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn_primary" type="submit">Отправить</button>
        </div>
    </form>
</div>
