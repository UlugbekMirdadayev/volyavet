<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Когда здоровье вашего питомца важнее всего остального"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="keywords" content=""/>
    {{--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    {{--      <link rel="stylesheet" href="/css/style.min.css" />--}}
    @vite(['resources/css/libs.css','resources/less/app.less'])
    <title>Ветеринарная клиника VolyaVet</title>
    {{--    <link--}}
    {{--      rel="stylesheet"--}}
    {{--      type="text/css"--}}
    {{--      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"--}}
    {{--    />--}}
</head>
</html>


<body id="body">
@include('layouts.tehworks')
<main class="main">
    <section class="mainSection">
        <header class="header">
            <div class="header__row">
                <div id="header__col_id" class="header__col">
                    <a href="/" aria-label="Logo">
                        <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Volyavet Logo" class="header__logo"
                             width="71" height="71"/>
                        {{--                        <picture>--}}
                        {{--                            <source srcset="{{ Vite::asset('resources/img/logo.webp') }}" type="image/webp">--}}

                        {{--                        </picture>--}}
                    </a>
                    <div class="dropdown">
                        <button class="dropbtn">
                            Меню
                            <img src="{{ Vite::asset('resources/img/dropdown.svg') }}" alt="Dropdown Icon" width="14"
                                 height="8" class="dropbtn-icon"/>
                        </button>
                        <div class="dropdown-content">
                            <a href="/#news" class="smooth-scroll">Новости и акции</a>
                            <a href="/aboutUs">О нас</a>
                            <a href="/services">Услуги и цены</a>
                            <a href="/library">Библиотека</a>
                            <a href="/#team" class="smooth-scroll">Наша команда</a>
                            <a href="/#feedback" class="smooth-scroll">Отзывы</a>
                            <a href="/contacts">Контакты</a>
                            <a href="https://lk.volyavet.ru/login"
                               class="redirectLK">Войти @include('components.svg.icon-sign-in')</a>
                        </div>
                    </div>
                </div>
                <div class="header__col">
                    <nav class="nav">
                        <a href="/#news" class="navLink smooth-scroll">Новости и акции</a>
                        <a href="/aboutUs" class="navLink">О нас</a>
                        <a href="/services" class="navLink">услуги и цены</a>
                        <a href="/library" class="navLink">Библиотека</a>
                        <a href="/#team" class="navLink smooth-scroll">Наша команда</a>
                        <a href="/#feedback" class="navLink smooth-scroll">Отзывы</a>
                        <a href="/contacts" class="navLink">Контакты</a>
                    </nav>
                </div>
                <div class="dropdown" id="dropdown_2">
                    <button class="dropbtn ml-2" id="dropbtn_2">
                        <img src="{{ Vite::asset('resources/img/location_point.svg') }}" alt="VolyaVet Logo" width="14"
                             height="8" class="droploc-icon"/>
                                {{ $current_branch->title }}
                        <svg class="dropbtn-icon" width="15" height="10" viewBox="0 0 15 9"
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="dropbtn-icon_path"
                                  d="M13.951 1.08497C14.3012 1.42488 14.3012 1.987 13.951 2.32692L8.28729 7.82402C7.89932 8.20057 7.28232 8.20057 6.89435 7.82402L1.23062 2.32692C0.880401 1.98701 0.880399 1.42488 1.23062 1.08497C1.56635 0.759113 2.10029 0.759113 2.43602 1.08497L6.89435 5.41213C7.28232 5.78868 7.89932 5.78868 8.28729 5.41213L12.7456 1.08497C13.0814 0.759114 13.6153 0.759113 13.951 1.08497Z"
                                  fill="#2A355E"/>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        @foreach($branches as $branch)
                            <a href="/admin/branch/{{ $branch->id }}">{{ $branch->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="header__col">
                    <form method="POST" action="{{route('search')}}">
                        @csrf
                        <input type="text" name="query" class="header__input" placeholder="Поиск"/>
                        <input type="hidden" name="library" value="true"/>
                        <button id="header__btn_ddd" class="header__btn_ddd">
                            <svg class="header__searchIcon" width="19" height="18" viewBox="0 0 19 18"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path class="header__searchIcon_path"
                                      d="M13.4565 11.3842H12.6542L12.3699 11.1171C13.3995 9.95347 13.9654 8.46795 13.9643 6.93159C13.9643 5.65955 13.5771 4.41606 12.8518 3.35839C12.1265 2.30072 11.0955 1.47637 9.88935 0.989579C8.68317 0.502787 7.35592 0.37542 6.07545 0.623584C4.79497 0.871749 3.61878 1.4843 2.69561 2.38377C1.77244 3.28325 1.14375 4.42925 0.889047 5.67685C0.634345 6.92446 0.765067 8.21764 1.26468 9.39286C1.7643 10.5681 2.61037 11.5726 3.69591 12.2793C4.78144 12.986 6.05768 13.3632 7.36325 13.3632C8.99827 13.3632 10.5013 12.7794 11.659 11.8097L11.9332 12.0868V12.8684L17.0109 17.8059L18.5241 16.3316L13.4565 11.3842ZM7.36325 11.3842C4.83454 11.3842 2.7933 9.39539 2.7933 6.93159C2.7933 4.4678 4.83454 2.47895 7.36325 2.47895C9.89195 2.47895 11.9332 4.4678 11.9332 6.93159C11.9332 9.39539 9.89195 11.3842 7.36325 11.3842Z"
                                      fill="#2A355E"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            </div>
        </header>
        @push('js')
            <style>
                a.redirectLK {
                    display: flex !important;
                    align-items: center;
                    gap: 8px;
                }
            </style>
            <script>


                $(document).ready(function () {
                    // Добавление обработчика события на клик по ссылке с классом "smooth-scroll"
                    $('.smooth-scroll').on('click', function (event) {
                        event.preventDefault(); // Отменить стандартное действие ссылки

                        var targetId = $(this).attr('href'); // Получить значение атрибута href
                        targetId = targetId.replace('/', ''); // Удалить символ слеша (/)

                        // Плавная прокрутка до целевого блока
                        $('html, body').animate({
                            scrollTop: $(targetId).offset().top - 100
                        }, 1000); // Здесь 1000 - это время (в миллисекундах) для завершения анимации прокрутки
                    });
                });
            </script>

@endpush
