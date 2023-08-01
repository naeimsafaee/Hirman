<header>
    <div class="cover-glass-show-menu">
        <div class="button-close-menu">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.582 13.4248L1.58203 1.4248" stroke="white" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round" />
                <path d="M13.582 1.4248L1.58203 13.4248" stroke="white" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round" />

            </svg>
        </div>
    </div>
    <nav>
        <div class="button-open-menu">
            <span class="line-top"></span>
            <span class="line-middle"></span>
            <span class="line-bottom"></span>
        </div>
        <ul>
            <div class="button-close-menu-layout">
                <div class="button-close-menu">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.582 13.4248L1.58203 1.4248" stroke="white" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M13.582 1.4248L1.58203 13.4248" stroke="white" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            {{ menu("top_header" , "components.navbar") }}
            <li>
                <a href="#">
                    اخبار و مقالات
                </a>
                <ul>
                    <li>
                        <a href="{{ route('internal.index') }}">
                            اخبار داخلی
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('foreign.index') }}">
                            اخبار خارجی
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}">
                            مقالات
                        </a>
                    </li>
                    <div class="sliding-bar"></div>
                </ul>
            </li>
            <li>
                <a href="#">
                    جشنواره ها
                </a>
                <ul>
                    <li>
                        <a href="{{ route('winner.index') }}">
                            تیم های برنده
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('playtime.index') }}">
                            زمان برگذاری
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}">
                            اخبار و اتفاقات
                        </a>
                    </li>
                    <div class="sliding-bar"></div>
                </ul>
            </li>
        </ul>

        <a href="{{ route('home') }}">
            <div class="logo">
                <img src="{{ Voyager::image(setting('site.navbar_logo')) }}" alt="">
            </div>
        </a>
    </nav>
</header>
