@extends('index')
@section('style')
    <style>
        @media screen and (max-width: 856px) {
            main {
                height: 480px;
            }

            footer {
                margin-top: 100px;
            }

            footer .footer > div {
                margin: 0 0 20px;
            }

            footer .footer .phone-text > div:first-child {
                margin-top: 0;
            }
        }
    </style>
@endsection
@section('content')
    <main>
        <div class="index-carousel-layout">
            <div class="carousel-circle-right">
                <div class="circle-centeral"></div>
                <div class="items-movie-layout">
                    <div class="button-prev-item">
                        <svg width="31" height="36" viewBox="0 0 31 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M13.9376 34.5859C14.0475 35.3846 14.7423 36.0002 15.583 36.0002C16.5002 36.0002 17.2437 35.2676 17.2437 34.3639L17.2437 5.60035L27.7459 15.9908L27.9319 16.1496C28.581 16.6263 29.5036 16.5754 30.0944 15.9956C30.7443 15.3579 30.7465 14.3218 30.0993 13.6815L16.7822 0.504594C16.7068 0.42706 16.6237 0.356828 16.5342 0.295072C15.8855 -0.153239 14.984 -0.0910707 14.4054 0.481554L1.06712 13.6816L0.906729 13.8654C0.42576 14.5071 0.481344 15.416 1.07218 15.9957C1.72209 16.6334 2.77354 16.6311 3.42067 15.9907L13.9224 5.59776L13.9224 34.3639L13.9376 34.5859Z"
                                  fill="white"/>
                        </svg>
                    </div>
                    <div class="items">
                        @foreach($homes as $home)
                            <div class="item @if($home == $homes->first()) active @endif"
                                 data-date="{{ Carbon\Carbon::parse($home->movie->release_at)->format('Y M d') }}"
                                 data-link="{{ route('movie.show', $home->movie->slug) }}"
                                 data-main-image="{{ Voyager::image($home->main_image) }}"
                                 data-video="{{ ($home->video) }}" data-en-name="{{ $home->en_title }}">
                                <a href="{{ route('movie.show', $home->movie->slug) }}">
                                    <div class="partition">
                                        <div class="image">
                                            <img src="{{ Voyager::image($home->image , 'cropped') }}" alt="">
                                        </div>
                                        <div class="text">
                                            <p>
                                                {{ $home->title }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="button-next-item">
                        <svg width="31" height="36" viewBox="0 0 31 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M16.8286 1.41407C16.7186 0.615364 16.0238 -0.000244141 15.1831 -0.000244141C14.2659 -0.000244141 13.5224 0.732381 13.5224 1.63612L13.5224 30.3996L3.02018 20.0091L2.83426 19.8503C2.18515 19.3737 1.26247 19.4246 0.671685 20.0044C0.0218238 20.6421 0.0196468 21.6782 0.666823 22.3185L13.9839 35.4954C14.0593 35.5729 14.1424 35.6431 14.2319 35.7049C14.8806 36.1532 15.7821 36.091 16.3607 35.5184L29.699 22.3184L29.8594 22.1345C30.3404 21.4929 30.2848 20.584 29.6939 20.0043C29.044 19.3666 27.9926 19.3688 27.3454 20.0092L16.8437 30.4022L16.8437 1.63612L16.8286 1.41407Z"
                                  fill="white"/>
                        </svg>
                    </div>
                </div>

            </div>
            <div class="show-item-carousel">
                @include('components.animation_top')
                <div class="image">
                    <div class="box-over-image box-dark-top"></div>
                    <img src="" alt="">
                    <video id="video-home-page" loop="true" muted="muted" autoplay="autoplay">
                        <source src="" type="video/mp4">
                    </video>

                    <div class="box-over-image box-dark-bottom"></div>
                </div>
                <div class="imformation-movies">
                    <div class="video-name">
                        <h1>

                        </h1>
                        <p>

                        </p>
                    </div>
                    <div class="date">
                        <span>

                        </span>
                    </div>
                    <div class="button-show-single-movie show">
                        <a href="">
                            <div class="flash">
                                <svg width="25" height="20" viewBox="0 0 25 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M24.0396 11.0972C24.572 11.0239 24.9824 10.5607 24.9824 10.0002C24.9824 9.38879 24.494 8.89313 23.8915 8.89313H4.71603L11.643 1.89169L11.7488 1.76774C12.0666 1.33501 12.0326 0.719891 11.6462 0.32604C11.221 -0.107197 10.5303 -0.108648 10.1034 0.322798L1.31904 9.20063C1.26673 9.25148 1.2194 9.30756 1.17787 9.36805C0.880468 9.80039 0.922363 10.4001 1.30354 10.7853L10.1035 19.6774L10.226 19.7843C10.6538 20.105 11.2598 20.0679 11.6462 19.674C12.0713 19.2408 12.0698 18.5398 11.6429 18.1084L4.71431 11.1073H23.8915L24.0396 11.0972Z"
                                          fill="#C42323"/>
                                </svg>
                            </div>
                            بیشتر بدانید ...
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
