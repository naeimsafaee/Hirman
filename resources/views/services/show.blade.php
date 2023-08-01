@extends('index')
@section('content')
    <main>
        @include('components.animation_top')

        <div class="pages-main">
            <div class="header-page">
                <h1>
                    {{ fa_number($service->title) }}
                </h1>
            </div>

            <div class="pages-body">
                <div class="explain">
                    <p>
                        {!! $service->content !!}
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
