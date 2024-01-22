<header id='newleaderline'>
    <div class="content">
        <div class="content_left">
            <a href="/" aria-label="Volyavet Logo">
                    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Volyavet Logo" class="header__logo" width="71" height="71"/>
{{--                <picture>--}}
{{--                    <source srcset="{{ Vite::asset('resources/img/logo.webp') }}" type="image/webp">--}}

{{--                </picture>--}}
            </a>
            <div class="dropdown">
                <button class="dropbtn ml-2">
                    Меню
                    <img src="{{ Vite::asset('resources/img/dropdown.svg') }}" alt="VolyaVet Logo" width="14" height="8" class="dropbtn-icon"/>
                </button>
                <div class="dropdown-content">
                    <a href="/#news" class="smooth-scroll">Новости и акции</a>
                    <a href="/aboutUs">О нас</a>
                    <a href="/services">Услуги и цены</a>
                    <a href="/library">Библиотека</a>
                    <a href="/#team">Наша команда</a>
                    <a href="/#feedback">Отзывы</a>
                    <a href="/contacts">Контакты</a>
                    <a href="https://lk.volyavet.ru/login" class="redirectLK">Войти @include('components.svg.icon-sign-in')</a>
                </div>
            </div>
        </div>
        <div class="content_right">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20ZM13.9996 13.536V11.9644C13.9996 11.9094 13.9797 11.8563 13.9428 11.8154C13.906 11.7745 13.8552 11.7487 13.8005 11.7431C13.6991 11.7333 13.6178 11.7236 13.556 11.7147C12.9399 11.6267 12.3405 11.4462 11.7783 11.1791C11.7349 11.1586 11.6856 11.154 11.639 11.1661C11.5925 11.1782 11.5517 11.2062 11.5237 11.2453L10.8393 12.2027C9.47294 11.6162 8.38407 10.5273 7.79768 9.16089L8.75674 8.47556C8.83673 8.41867 8.86429 8.31244 8.82207 8.22356C8.55453 7.66126 8.37353 7.06174 8.28521 6.44533C8.27632 6.38356 8.26698 6.30222 8.25676 6.2C8.25125 6.14515 8.22555 6.0943 8.18465 6.05734C8.14375 6.02038 8.09057 5.99994 8.03544 6H6.46397C6.35146 5.99995 6.24311 6.04258 6.16079 6.11929C6.07848 6.196 6.02832 6.30109 6.02044 6.41333C6.00667 6.60756 6 6.76622 6 6.88889C6 10.8164 9.18338 14 13.1107 14C13.2334 14 13.392 13.9929 13.5862 13.9796C13.6985 13.9717 13.8036 13.9215 13.8803 13.8392C13.957 13.7569 13.9996 13.6485 13.9996 13.536Z"
                      fill="#64C1C6"/>
            </svg>
            <p class="text">{{ !$current_branch->phone ? "+7 (977) 799-87-82" : $current_branch->phone }}</p>
            <a target="_blank" href="https://{{!$current_branch->telegram ? "t.me" : $current_branch->telegram}}" class="pr-4" aria-label="Telegram">
                <img src="{{ Vite::asset('resources/img/telegram.svg') }}" alt="Telegram" width="30" height="30" class="icon">
            </a>
            <a target="_blank" href="https://{{!$current_branch->whats_up ? $current_branch->viber : $current_branch->whats_up}}" aria-label="Whats App">
                <img src="{{ Vite::asset('resources/img/viber.svg') }}" alt="Whats App" width="30" height="30" class="icon">
            </a>
            <button onclick="showRegister({{ $current_branch->id }})" class="hidden md:block uppercase">Записаться на приём</button>
            <button onclick="showRegister({{ $current_branch->id }})" class="block md:hidden uppercase text-sm p-2.5">Записаться</button>
        </div>
    </div>
</header>
@push('js')
    <script>
        const $header = $("#newleaderline")
        let prevScroll
        let lastShowPos

        $(window).on("scroll", function () {
            const scrolled = $(window).scrollTop()

            if (scrolled > 100 && scrolled > prevScroll) {
                $header.addClass("header-out")
                lastShowPos = scrolled
            } else if (scrolled <= Math.max(lastShowPos - 250, 0)) {
                $header.removeClass("header-out")
            }
            prevScroll = scrolled
        })

    </script>
@endpush
