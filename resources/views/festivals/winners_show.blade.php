@extends('index')
@section('content')
    <main>
       @include('components.animation_top')

        <div class="single-asaar-main">

            <div class="header-page">
                <h1>
                    {{ fa_number($winner->title) }}
                </h1>
            </div>

            <div class="single-asaar-body">
                <div class="photo-layout">
                    <div class="photo">
                        <img src="{{ Voyager::image($winner->image) }}" alt="">
                    </div>
                    <div class="date-push">
                        <img src={{ asset("assets/icon/video.svg") }} alt="">
                        <p>
                            تاریخ اکران : {{ fa_number(verta($winner->release_at)->format('%d %B %Y')) }}
                        </p>
                    </div>
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
                                        {!! $winner->content !!}
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
