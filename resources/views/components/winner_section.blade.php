<div class="item">
    <a href="{{ route('winner.show',$winner->slug) }}">
        <div class="figure">
            <img src="{{ Voyager::image($winner->image) }}" alt="">
        </div>
        <div class="figcaption">
            <div class="caption-header">
                <div class="text">
                    <h2>
                        {{fa_number($winner->title)}}
                    </h2>
                </div>
            </div>
        </div>
    </a>
</div>
