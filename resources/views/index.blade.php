<?php
$page = \App\Models\Page::where('name', 'main')->first();
// $page->title
$branch = \App\Services\BranchService::current();

?>


@extends('layouts.main2',  ['title' => $page->title, 'description' => Str::words($page->description, 150)])

@section('main-container')

    <div class="mainSection__lineBlock mainSection__lineBlock-mobile">
        <a target="_blank" href="https://{{$branch->telegram ?? "#"}}" aria-label="Telegram"><img
                src="{{ Vite::asset('resources/img/telegram.svg') }}" alt="Telegram" width="60" height="30"
                class="icon"/></a>
        <a target="_blank" href="https://{{!$branch->whats_up ? $branch->viber : $branch->whats_up}}" aria-label="WhatsApp"><img
                src="{{ Vite::asset('resources/img/viber.svg') }}" width="60" height="30" alt="Whats App"
                class="icon"/></a>
    </div>
    <div class="container mainSection__container">
        <div class="mainSection__lineBlock mainSection__lineBlock-desctop">
            <a target="_blank" href="https://{{$branch->telegram ?? "#"}}" aria-label="Telegram"><img
                    src="{{ Vite::asset('resources/img/telegram90.svg') }}" width="60" height="30" alt="Telegram"
                    class="icon"/></a>
            <a target="_blank" href="https://{{!$branch->whats_up ? $branch->viber : $branch->whats_up}}" aria-label="WhatsApp"><img
                    src="{{ Vite::asset('resources/img/viber90.svg') }}" width="60" height="30"  alt="Whats App"
                    class="icon"/></a>
        </div>
        <div class="mainSection__left">
            <p class="text text-xs lg:text-base">
                Когда здоровье вашего питомца <br/>
                важнее всего остального
                <img
                    src="{{ Vite::asset('resources/img/mainLineForText.png') }}"
                    alt=""
                    class="mainLineForText"
                />
            </p>
            <h2 class="title title-xl">
                Ветеринарная <br/>
                клиника <span class="volyavet-title black">V0LYAVET</span>
            </h2>
            <div class="actions_row flex gap-5">
                <button class="button" onclick="showRegister({{ $current_branch->id }})">Записаться на приём</button>
                <a href="https://lk.volyavet.ru/login" class="button_2 button">Личный кабинет</a>
            </div>
            <div class="textGroup">
                <div class="text">Профессиональные врачи с огромным опытом</div>
                <div class="text lg:!px-2">Новое современное оборудование</div>
                <div class="text lg:!px-2">Безграничная любовь и забота о животных</div>
            </div>
        </div>
        <div class="mainSection__right">
            <picture class="mainSection__img_picture">
{{--                <source srcset="{{ Vite::asset('resources/img/main.webp') }}" type="image/webp">--}}
                <img
                    src="{{ Vite::asset('resources/img/main-comp.png') }}"
                    alt="Main Image"
                    class="image image-bl mainSection__img"
                    width="auto"
                    height="auto"
                />
            </picture>
            <picture>
{{--                <source srcset="{{ Vite::asset('resources/img/main-tablet.webp') }}" type="image/webp">--}}
                <img
                    src="{{ Vite::asset('resources/img/main-tablet-comp_new.png') }}"
                    alt="Main Image Tablet"
                    class="image image-bl mainSection__imgTablet"
                    width="auto" height="auto"
                    {{--                width="361"--}}
                    {{--                height="412"--}}
                />
            </picture>
            <picture>
{{--                <source srcset="{{ Vite::asset('resources/img/main-mobile.webp') }}" type="image/webp">--}}
                <img
                    src="{{ Vite::asset('resources/img/main-mobile-comp.png') }}"
                    alt="Main Image Mobile"
                    class="image image-bl mainSection__imgMobile"
                    width="auto" height="auto"
                    {{--                width="290"--}}
                    {{--                height="460"--}}
                />
            </picture>

        </div>
    </div>
    </section>

    <section class="servicesSection">
        <div class="container">
            <h3 class="title title-withDot">Услуги</h3>
            <p class="text">
                Мы каждый день с 9:00 до 21:00 на связи и готовы оказать качественную медициснскую помощь вашему любимцу
            </p>
            <div class="servicesSection__cardGroup">
                <div class="cardService">
                    <a href="{{route('services')}}#3" aria-label="Стационар">
                        <img src="{{ Vite::asset('resources/img/service1.jpg') }}" alt="Стационар" class="cardImg"
                             width="auto" height="auto" loading="lazy"/>
                        <p class="cardTitle">Стационар</p>
                    </a>
                </div>
                <div class="cardService">
                    <a href="{{route('services')}}#4" aria-label="Анализы">
                        <img src="{{ Vite::asset('resources/img/service2.jpg') }}" alt="Анализы" class="cardImg"
                             width="auto" height="auto" loading="lazy"/>
                        <p class="cardTitle">Анализы</p>
                    </a>
                </div>
                <div class="cardService">
                    <a href="{{route('services')}}#10" aria-label="Хирургия">
                        <img src="{{ Vite::asset('resources/img/service3.jpg') }}" alt="Хирургия" class="cardImg"
                             width="auto" height="auto" loading="lazy"/>
                        <p class="cardTitle">Хирургия</p>
                    </a>
                </div>
                <div class="cardService">
                    <a href="{{route('services')}}#8" aria-label="Терапия">
                        <img src="{{ Vite::asset('resources/img/service4.jpg') }}" alt="Терапия" class="cardImg"
                             width="auto" height="auto" loading="lazy"/>
                        <p class="cardTitle">Терапия</p>
                    </a>
                </div>
                <div class="cardService">
                    <a href="{{route('services')}}" aria-label="Вакцинации">
                        <img src="{{ Vite::asset('resources/img/service5.jpg') }}" alt="Вакцинации" class="cardImg"
                             width="auto" height="auto" loading="lazy"/>
                        <p class="cardTitle">Вакцинации</p>
                    </a>
                </div>
                <div class="cardService">
                    <a href="{{route('services')}}#11" aria-label="Стоматология">
                        <img src="{{ Vite::asset('resources/img/service6.jpg') }}" alt="Стоматология" class="cardImg"
                             width="auto" height="auto" loading="lazy"/>
                        <p class="cardTitle">Стоматология</p>
                    </a>
                </div>
            </div>
            <a class="button" href="{{route('services')}}">Список всех услуг</a>
        </div>
    </section>

    <section class="teamSection" id="team">
        <div class="container">
            <h3 class="title title-withDot">Наша команда</h3>
            <div class="slider team-slider">

                <?php
                $teams = App\Models\Team::query()->where(['branch_id' => \App\Services\BranchService::current()->id])->get();
                ?>


                @foreach ($teams as $person)

                    <div class="slider__item">
                        <img src="{{ $person->getImage() }}" alt="" class="slider__img"/>
                        <div class="slider__textBlock h-[100px] md:h-[120px] lg:h-[110px]">
                            <h5 class="teamSection__itemTitle">{{ $person->title }}</h5>
                            <p class="teamSection__itemText">
                                {{ $person->body }}
                            </p>
                            <span class="teamSection__itemSpan">Стаж {{ $person->exp }}</span>
                        </div>
                        <div class="teamSection__hoverItem">
                            <div class="close-icon">
                                <svg id="hideHoverSlider" style="z-index:99999999!important;" class="exit" width="21" height="22"
                                     viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.81 21L1.92676 1M19.81 1L1.92676 21" stroke="#F8F8F8" stroke-width="2"
                                          stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class="slider__textBlock">
                                <h5 class="teamSection__itemTitle">{{ $person->title }}</h5>
                                <p class="teamSection__itemText">
                                    {{ $person->body }}
                                </p>
                                <span class="teamSection__itemSpan">Стаж {{ $person->exp }}</span>
                            </div>
                            <div class="teamSection__contentItem ">
                                {{ $person->description }}
                            </div>
                            <button class="button" onclick="showRegister({{ $current_branch->id }})">Записаться</button>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

    <section class="whenSection">
        <div class="container">
{{--            <h3 class="title title-withDot"></h3>--}}
            <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px] block md:hidden">Когда стоит обратиться в <span class="block">клинику ?</span></h3>
            <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px] hidden md:block">Когда стоит обратиться в клинику ?</h3>
            <p class="text">
                Мы каждый день с 9:00 до 21:00 на связи и готовы оказать качественную медициснскую помощь вашему любимцу
            </p>
            <div class="whenSection__row">
                <div class="whenSection__left">
                    <picture>
                        <source srcset="{{ Vite::asset('resources/img/when.webp') }}" type="image/webp">
                        <img
                            src="{{ Vite::asset('resources/img/when.png') }}"
                            alt="Cat looking"
                            class="image image-br whenSection__desctop"

                        />
                    </picture>
                    <picture>
                        <source srcset="{{ Vite::asset('resources/img/when-tablet.webp') }}" type="image/webp">
                        <img
                            src="{{ Vite::asset('resources/img/when-tablet.png') }}"
                            alt="Cat looking tablet"
                            class="image image-br whenSection__tablet"

                        />
                    </picture>
                    <picture>
                        <source srcset="{{ Vite::asset('resources/img/when-mobile.webp') }}" type="image/webp">
                        <img
                            src="{{ Vite::asset('resources/img/when-mobile.png') }}"
                            alt="Cat looking mobile"
                            class="image image-br whenSection__mobile"

                        />
                    </picture>

                </div>
                <div class="whenSection__right">
                    <?php
                    $evidences = DB::table('symptoms')->get();

                    foreach ($evidences as $index => $evid) {
                    if ($index < 3) { ?>
                    <div class="whenSection__item"><?= $evid->title; ?></div>
                    <?php } else { ?>
                    <div class="whenSection__item hidden-on-mobile"><?= $evid->title; ?></div>
                    <?php }
                    } ?>
                    <button class="button whenSection__allButton hidden-on-desktop" onclick="showAllSymptoms()">СМОТРЕТЬ
                        ВСЕ СИМПТОМЫ
                    </button>
                    <div class="fullWidth">
                        <button class="button whenSection__linkButton" onclick="showRegister({{ $current_branch->id }})">Записаться на приём
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @include('layouts.news')

    <section class="userFeedbacksSection" id="feedback">
        <div class="container">
            <h3 class="title title-withDot">Отзывы</h3>
            <button class="userFeedbacksSection__button px-2 py-1 md:px-0 md:py-0">
                <img src="{{ Vite::asset('resources/img/yandex.svg') }}" width="auto" height="auto" alt="Yandex Icon"/>
                Яндекс.Карты <b class="pl-1.5 pr-1.5"> 5.0</b>
            </button>

            <div class="slider slider-light feedbacks-slider">
                @php
                    Carbon\Carbon::setLocale('ru');
                    $reviews = \App\Models\Review::limit(10)->get();
                @endphp
                @foreach($reviews as $review)
                    <div class="userFeedbacksSection__card h-[400px] md:h-[400px] xl:h-[500px]">
                        <div class="userFeedbacksSection__userRow">
                            <div class="userFeedbacksSection__userIcon"><img alt="{{$review->author}}"
                                                                             src="{{$review->image ?? $review->getImage()}}"
                                                                             width="auto" height="auto" loading="lazy"
                                                                             style="border-radius: 50%;"></div>
                            <div class="userFeedbacksSection__userInfo">
                                <div class="userFeedbacksSection__stars">
                                    <img src="{{ Vite::asset('resources/img/star.svg') }}" width="21" height="20"
                                         alt="Star"/>
                                    <img src="{{ Vite::asset('resources/img/star.svg') }}" width="21" height="20"
                                         alt="Star"/>
                                    <img src="{{ Vite::asset('resources/img/star.svg') }}" width="21" height="20"
                                         alt="Star"/>
                                    <img src="{{ Vite::asset('resources/img/star.svg') }}" width="21" height="20"
                                         alt="Star"/>
                                    <img src="{{ Vite::asset('resources/img/star.svg') }}" width="21" height="20"
                                         alt="Star"/>
                                </div>
                                <h5 class="userFeedbacksSection__userName">{{$review->author}}</h5>
                                <p class="userFeedbacksSection__date">{{Carbon\Carbon::parse($review->published_at)->translatedFormat('d M. Y')}}</p>
                            </div>
                        </div>
                        <p class="userFeedbacksSection__feedbackText">{{$review->body}}</p>
                        <div class="userFeedbacksSection__more">Подробнее</div>
                        <a href="https://yandex.ru/maps/org/volyavet/225599149948"
                           class="userFeedbacksSection__linkToMap"
                        >Отзыв из Яндекс.Карт</a
                        >
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @push('js')
        <script>
            $(document).ready(function () {

                $('.userFeedbacksSection__more').click(function (e) {
                    e.preventDefault();
                    $(this).closest('.userFeedbacksSection__card').toggleClass('expanded');
                });

                if ($(window).innerWidth() <= 1280) {
                    console.log('>= 1280')
                    $('.slider__item').on('click', function(e) {
                        e.stopPropagation(); // Останавливаем всплытие события
                        let close_icon = $(this).find('.close-icon');
                        let hvri = $(this).find('.teamSection__hoverItem');
                        hvri.attr('style', 'display: flex !important');
                        $(this).addClass('slider-hovered');
                        close_icon.attr('style', 'display: block !important');
                        hvri.addClass('disable');
                    });

                    $('svg#hideHoverSlider').on('click', function(e) {
                        e.stopPropagation(); // Останавливаем всплытие события
                        var selec = $(this);
                        var hvri = $(this).closest('.teamSection__hoverItem');
                        var close_icon = $(this).closest('.close-icon');
                        hvri.removeClass('disable');
                        close_icon.attr('style', 'display: none !important');
                        hvri.attr('style', 'display: none !important');
                        selec.closest('.slider__item').removeClass('slider-hovered');
                        hovered_clicked = false;
                    });
                } else {
                    console.log('<= 1280')
                    $('.slider__item').on('click', function(e) {
                        e.stopPropagation(); // Останавливаем всплытие события
                        // let close_icon = $(this).find('.close-icon');
                        // let hvri = $(this).find('.teamSection__hoverItem');
                        // hvri.attr('style', 'display: flex !important');
                        // $(this).addClass('slider-hovered');
                        // close_icon.attr('style', 'display: block !important');
                        // hvri.addClass('disable');
                    });

                    $('svg#hideHoverSlider').on('click', function(e) {
                        e.stopPropagation(); // Останавливаем всплытие события
                        var selec = $(this);
                        var hvri = $(this).closest('.teamSection__hoverItem');
                        var close_icon = $(this).closest('.close-icon');
                        hvri.removeClass('disable');
                        close_icon.attr('style', 'display: none !important');
                        hvri.attr('style', 'display: none !important');
                        selec.closest('.slider__item').removeClass('slider-hovered');
                        hovered_clicked = false;
                    });
                }


            });
        </script>
        @endpush
        @include('layouts.form')
        </main>

        @endsection
