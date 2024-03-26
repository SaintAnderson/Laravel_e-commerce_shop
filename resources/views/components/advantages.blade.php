@foreach($advantages as $one)
    <div class="Section-columnSection Section-columnSection_mark">
        <div class="media media_advantage">
            <div class="media-image">
                <img src="/assets/img/icons/advantages/{{$one->image_url}}" alt="icon"/>
            </div>
            <div class="media-content">
                <strong class="media-title">{{$one->title}}</strong>
                <p class="media-text">{{$one->description}}</p>
            </div>
        </div>
    </div>
@endforeach
