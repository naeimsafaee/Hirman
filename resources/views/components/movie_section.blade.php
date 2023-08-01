<div class="item">
    <a href="{{route('movie.show',$movie->slug)}}">
        <div class="figure">
            <img src="{{ Voyager::image($movie->image , 'cropped') }}" alt="111">
        </div>
        <div class="figcaption">
            <div class="caption-header">
                <div class="text">
                    <h2>
                        {{ fa_number($movie->s_title)}}
                    </h2>
                </div>
            </div>
        </div>
    </a>
</div>
