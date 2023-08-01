@extends('index')

@section('modal')
    <div class="popup-photo-layout">
        <div class="popup-photo">
            <div class="button-close-popup">
                <img src="{{ asset('assets/icon/close.svg') }}" alt="">
            </div>
            <div class="child-layout">
                <img src="{{ Voyager::image(strlen($movie->vertical_image) > 0 ? $movie->vertical_image : $movie->image) }}" alt="">
            </div>
        </div>
    </div>
    @if(($movie->trailer))
        <div class="popup-video-layout">
            <div class="popup-video">
                <div class="button-close-popup">
                    <img src="{{asset('assets/icon/close.svg')}}" alt="">
                </div>
                <div class="child-layout">
                    <div class="play-video">
                        <img src="{{asset('assets/icon/play.svg')}}" alt="">
                    </div>
                    <img src="{{ Voyager::image($movie->image) }}" alt="">
                    <video controls id="video">
                        <source src="{{ ($movie->trailer) }}">
                    </video>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('content')
    <main>
        @include('components.animation_top')

        <div class="single-asaar-main">

            <div class="header-page">
                <h1>
                    {{ fa_number($movie->title)}}
                </h1>
            </div>

            <div class="single-asaar-body">
                <div class="photo-layout">
                    <div class="photo">
                        <img src="{{ Voyager::image((strlen($movie->vertical_image) > 0 ? $movie->vertical_image : $movie->image) ) }}" alt="">
                    </div>
                    <div class="date-push">
                        <img src={{ asset("assets/icon/video.svg") }} alt="">
                        <p>
                            تاریخ اکران : {{ fa_number(verta($movie->release_at)->format('%d %B %Y')) }}
                        </p>
                    </div>
                    @if(($movie->trailer))
                        <div class="button-show-teaser">
                            <p>
                                نمایش تریلر
                            </p>
                        </div>
                    @endif
                </div>
                <div class="explain">
                    <ul>
                        @if(count($directors) >0)
                            <li>
                                <div class="title">
                                    <p>
                                        کارگردان :
                                    </p>
                                </div>
                                <div class="items">
                                    @foreach($directors as $director)
                                        <div class="item">
                                            <img src="{{ Voyager::image($director->image) }}" alt="">
                                            <p>
                                                {{ $director->name }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        @if(count($writers) >0)

                            <li>
                                <div class="title">
                                    <p>
                                        نویسنده :
                                    </p>
                                </div>
                                <div class="items">
                                    @foreach($writers as $writer)
                                        <div class="item">
                                            <img src="{{ Voyager::image($writer->image) }}" alt="">
                                            <p>
                                                {{$writer->name}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        @if( count($producers) >0)
                            <li>
                                <div class="title">
                                    <p>
                                        تهیه کننده :
                                    </p>
                                </div>
                                <div class="items">
                                    @foreach($producers as $producer)
                                        <div class="item">
                                            <img src="{{ Voyager::image($producer->image) }}" alt="">
                                            <p>
                                                {{$producer->name}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        @if( count($actors ) >0)
                            <li>
                                <div class="title">
                                    <p>
                                        بازیگران :
                                    </p>
                                </div>
                                <div class="items">
                                    @foreach($actors as $actor)
                                        <div class="item">
                                            <img src="{{ Voyager::image($actor->image) }}" alt="">
                                            <p>
                                                {{$actor->name}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        <li>
                            <div class="title">
                                <p>
                                    خلاصه اثر :
                                </p>
                            </div>

                            <div class="items">
                                <div class="item">
                                    <p>
                                        {!! $movie->content !!}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('start_op')
    <div class="top-site">
        @endsection

        @section('end_op')
    </div>
@endsection
