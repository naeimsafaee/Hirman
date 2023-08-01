@extends('index')
@section('content')
    <main>
        @include('components.animation_top')
        <div class="contactus-main">
            <div class="header-page">
                <h1>
                    تماس با ما
                </h1>
            </div>

            <div class="contactus-body">
                <div class="contactus-form">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="input-layout">
                            <label for="fullname">
                                نام و نام خانوادگی
                            </label>
                            <input type="text" placeholder="نام و نام خانوادگی را وارد کنید" id="fullname" name="fullName">
                            @error('fullName')
                            <span style="color: red;padding-top: 10px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-layout">
                            <label for="phone-number">
                                شماره موبایل
                            </label>
                            <input class="input-number" type="number" placeholder="شماره موبایل را وارد کنید" id="phone-number" name="phoneNumber">
                            @error('phoneNumber')
                            <span style="color: red;padding-top: 10px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="textarea-layout">
                            <label for="explain">
                                توضیحات
                            </label>
                            <textarea name="explain" id="explain" placeholder="توضیحات را وارد کنید"></textarea>
                            @error('explain')
                            <span style="color: red;padding-top: 10px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="button-layout">
                            <input type="submit" value="ارسال پیام">
                        </div>
                    </form>
                    @if (\Session::has('success'))
                        <div style="color: greenyellow; text-align: center;">
                            <span>{!! \Session::get('success') !!}</span>
                        </div>
                    @endif
                    @if (\Session::has('fail'))
                        <div style="color: darkred; text-align: center;">
                            <span>{!! \Session::get('fail') !!}</span>
                        </div>
                    @endif
                </div>
                <div class="contactus-map">
                    <div style="width: 100%"><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%25&amp;hl=en&amp;q=35.699673,%2051.440021+(Hirman%20Pictures)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="100%" frameborder="0"></iframe></div>
                </div>
          
            </div>
        </div>
    </main>
@endsection
