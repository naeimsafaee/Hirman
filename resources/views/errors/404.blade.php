@extends('index')
@section('content')
    <main>
        @include('components.animation_top')

        <div class="notfound-main">
            <div class="notfound-layout">
                <div class="notfound-image">
                    <img src={{asset("assets/icon/404.svg")}} alt="">
                </div>
                <div class="text-header">
                    <h1>
                        صفحه مورد نظر پیدا نشد
                    </h1>
                </div>
                <div class="list-reason-show-this-page">
                    <ul>
                        <li>
                            متاسفانه در این دسته و آرشیو نوشته ای درج نشده است
                        </li>
                        <li>
                            ممکن است شما دسترسی لازم را برای این بخش نداشته باشید
                        </li>
                        <li>
                            ممکن است تاریخ انقضای مطالب این بخش سر رسیده باشد
                        </li>
                    </ul>
                </div>
                <div class="back-home-page">
                    <a href="{{ route('home') }}">
                        بازگشت به صفحه اصلی
                    </a>
                </div>
            </div>
        </div>

    </main>
@endsection
