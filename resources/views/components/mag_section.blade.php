<div class="item">
    <div class="figure">
        <img src="{{ Voyager::image($mag->image) }}" alt="">
    </div>
    <div class="figcaption">
        <div class="caption-header">
            <div class="text">
                <h2>
                    {{ fa_number($mag->title)}}
                </h2>
            </div>

        </div>
        <div class="caption-body">
            <p>
                {{ mb_substr($mag->content , 0 , 70) }}...
            </p>
        </div>
        <div class="link-view-single-layout">
            <div class="date-push">
                <p>
                    {{ fa_number(verta($mag->created_at)->format('%d %B %Y')) }}
                </p>
                <img src="@if($mag->isVideo) {{asset("assets/icon/video.svg")}}  @else {{asset("assets/icon/clock.svg")}} @endif" alt="">
            </div>
            <div class="link-view-single">
                <a href="@if ($mag->type == 'blog') {{route('blog.show',$mag->slug)}} @elseif($mag->type == 'internal') {{route('internal.show',$mag->slug)}} @else {{route('foreign.show',$mag->slug)}} @endif">
                    اطلاعات بیشتر
                </a>
            </div>
        </div>
    </div>
</div>
