<div class="Card">
    <a class="Card-picture" href="{{route('articles.show', $article)}}"><img src="{{ $article->image_url }}" alt="card.jpg" />
    </a>
    <div class="Card-content">
        <strong class="Card-title"><a href="{{route('articles.show', $article)}}">{{$article->title}}</a>
        </strong>
    </div>
</div>
