<div class="service-item">
    <a href="{{ route('service.show',$service->slug) }}">
        <div class="service-image-layout">
            <div class="service-image">
                <img src="{{ Voyager::image($service->image) }}" alt="">
            </div>
        </div>
        <div class="figcaption">
            <div class="header">
                <h2>
                    {{ $service->title }}
                </h2>
            </div>
            <div class="service-explain">
                <p>
                    {{ mb_substr($service->content , 0 , 70) }}...
                </p>
            </div>
        </div>
    </a>
</div>
