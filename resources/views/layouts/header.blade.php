<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="{{ $description }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{--    <meta name="description" content="Когда здоровье вашего питомца важнее всего остального" />--}}
    <meta name="keywords" content=""/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    @yield('other')
    @vite(['resources/css/libs.css','resources/less/app.less'])
    <title>{{ $title }}</title>
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
    <div class="container">
        <header class="header">
            <div class="header__row">
                <div class="header__col">
                    <a href="/" aria-label="Logo">
                            <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Volyavet Logo" class="header__logo" width="71" height="71"/>
{{--                        <picture>--}}
{{--                            <source srcset="{{ Vite::asset('resources/img/logo.webp') }}" type="image/webp">--}}

{{--                        </picture>--}}
                    </a>
                    <div class="dropdown">
                        <button class="dropbtn">
                            Меню
                            <img src="{{ Vite::asset('resources/img/dropdown.svg') }}" width="14" height="8" alt="DropDown Icon"
                                 class="dropbtn-icon"/>
                        </button>
                        <div class="dropdown-content">
                            <a href="/#news" class="smooth-scroll">Новости и акции</a>
                            <a href="/aboutUs">О нас</a>
                            <a href="/services">Услуги и цены</a>
                            <a href="/library">Библиотека</a>
                            <a href="/#team" class="smooth-scroll">Наша команда</a>
                            <a href="/#feedback" class="smooth-scroll">Отзывы</a>
                            <a href="/contacts">Контакты</a>
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
                    <button class="dropbtn ml-2" id="dropbtn_2" style="color: #D1FDFF;">
                        <img src="{{ Vite::asset('resources/img/location_point.svg') }}" alt="VolyaVet Logo" width="14"
                             height="8" class="droploc-icon"/>
                        {{ $current_branch->title }}
                        <svg class="dropbtn-icon" width="15" height="10" viewBox="0 0 15 9"
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="dropbtn-icon_path"
                                  d="M13.951 1.08497C14.3012 1.42488 14.3012 1.987 13.951 2.32692L8.28729 7.82402C7.89932 8.20057 7.28232 8.20057 6.89435 7.82402L1.23062 2.32692C0.880401 1.98701 0.880399 1.42488 1.23062 1.08497C1.56635 0.759113 2.10029 0.759113 2.43602 1.08497L6.89435 5.41213C7.28232 5.78868 7.89932 5.78868 8.28729 5.41213L12.7456 1.08497C13.0814 0.759114 13.6153 0.759113 13.951 1.08497Z"
                                  fill="#D1FDFF"/>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        @foreach($branches as $branch)
                            <a href="/admin/branch/{{ $branch->id }}">{{ $branch->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="header__col">
                    <div class="header__search">
                        <form method="POST" action="{{route('search')}}">
                            @csrf
                            <input type="text" name="query" class="header__input" placeholder="Поиск"/>
                            <input type="hidden" name="library" value="true"/>
                            <button class="header__btn_ddd"><img src="{{ Vite::asset('resources/img/search.svg') }}" alt=""
                                                                 class="header__searchIcon"/></button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
