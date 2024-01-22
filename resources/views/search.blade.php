@extends('layouts.main',  ['title' => 'Поиск', 'description' => 'Поиск'])

@section('main-container')

    <section class="searchSection">
        <div class="container">
            <div class="breadcrums mt-0 mb-6">
                <a href="/" class="link breadcrums__link">Главная</a>
                <hr class="breadcrums__hr">
                <p class="breadcrums__text">Поиск</p>
            </div>
            <div class="flex flex-col md:flex-row">
                <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px]">Найдено - {{$posts->count()}}</h3>
                <span class="hr mx-[32px] h-[42px] hidden md:block"></span>
                @if(isset($query))
                    <p class="text-sm text-[#D1FDFF] uppercase md:self-center mt-3.5 md:mt-0">по запросу «{{$query}}»</p>
                @endif
            </div>
            <div class="header__search_static flex relative pt-11 flex-col items-stretch w-full px-0 md:px-[100px]">
                <form id="search" method="POST" action="{{route('search')}}">
                    @csrf
                    <input type="text" name="query" class="header__input w-full" placeholder="Поиск"/>
{{--                    <input type="hidden" name="news" value="false"/>--}}
{{--                    <input type="hidden" name="aboutus" value="false"/>--}}
{{--                    <input type="hidden" name="services" value="false"/>--}}
{{--                    <input type="hidden" name="library" @if((request()->news === "true" || request()->abouts === "true" || request()->services === "true" || request()->teams === "true" || request()->reviews === "true" || request()->contacts === "true") && request()->library === "true") value="true" @else value="false" @endif"/>--}}
{{--                    <input type="hidden" name="teams" value="false"/>--}}
{{--                    <input type="hidden" name="reviews" value="false"/>--}}
{{--                    <input type="hidden" name="contacts" value="false"/>--}}

                    <button class="header__btn_ddd" style="right: unset!important;"><img src="../../img/search.svg"
                                                                                         alt=""
                                                                                         class="header__searchIcon"/>
                    </button>
                    <script>

                    </script>
{{--                    <h4 class="uppercase text-white my-6">Уточнить поиск в разделе</h4>--}}
{{--                    <div class="header__category_search">--}}
{{--                        <div id="list_buttons" class="flex uppercase flex-row items-start p-0 gap-3 flex-grow-2 flex-wrap justify-center xl:justify-start">--}}
{{--                            <button class="sap__button {{request()->news === "true" ? 'active' : 'not_active'}}" id="news" onclick="event.preventDefault(); updateCategory('news');">Новости и Акции</button>--}}
{{--                            <button class="sap__button {{request()->aboutus === "true" ? 'active' : 'not_active'}}"  id="aboutus"  onclick="event.preventDefault(); updateCategory('aboutus');">О нас</button>--}}
{{--                            <button class="sap__button {{request()->services === "true" ? 'active' : 'not_active'}}" id="services"  onclick="event.preventDefault(); updateCategory('services');">Услуги</button>--}}
{{--                            <button class="sap__button {{request()->library === "true" ? 'active' : 'not_active'}}" id="library"  onclick="event.preventDefault(); updateCategory('library');">Библиотека</button>--}}
{{--                            <button class="sap__button {{request()->teams === "true" ? 'active' : 'not_active'}}" id="teams"  onclick="event.preventDefault(); updateCategory('teams');">Наша команда</button>--}}
{{--                            <button class="sap__button {{request()->reviews === "true" ? 'active' : 'not_active'}}" id="reviews"  onclick="event.preventDefault(); updateCategory('reviews');">Отзывы</button>--}}
{{--                            <button class="sap__button {{request()->contacts === "true" ? 'active' : 'not_active'}}" id="contacts"  onclick="event.preventDefault(); updateCategory('contacts');">Контакты</button></div>--}}
{{--                    </div>--}}
                </form>
            </div>
            <style>
                .searchSection__text {
                    display: -webkit-box;
                    max-width: 100%;
                    font-size: 12px;
                    -webkit-line-clamp: 4; /* количество строк */
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
            </style>
            @foreach ($posts as $post)

                <div class="searchSection__row">
                    <div class="searchSection__col">
                        <div class="searchSection__textBlock">
                            @if($post instanceof \App\Models\News || $post instanceof \App\Models\Post || $post instanceof \App\Models\Team)
                                <img src="{{$post->getImage()}}" alt="" class="card__image image"/>
                            @elseif($post instanceof \App\Models\Review)
                                <img src="{{$post->image ?? $post->getImage()}}" alt="" class="card__image image" width="120" height="120"/>

                            @endif

                            <div>
                                <h4 class="searchSection__title">
                                    @if($post instanceof \App\Models\Post)
                                        {{$post->title}}
                                    @elseif($post instanceof \App\Models\News)
                                        {{$post->title}}
                                    @elseif($post instanceof \App\Models\Team)
                                        {{$post->title}}

                                    @elseif($post instanceof \App\Models\Review)
                                        {{$post->author}}

                                    @elseif($post instanceof \App\Models\Contact)
                                        @if($post->type === 'whatsapp')
                                            What's App
                                            @elseif($post->type === 'telegram')
                                            Telegram
                                            @elseif($post->type === 'address')
                                            Адрес
                                            @elseif($post->type === 'email')
                                            Почта
                                            @elseif($post->type === 'viber')
                                            Viber
                                            @elseif($post->type === 'number')
                                            Телефон
                                            @elseif($post->type === 'work')
                                            ВРЕМЯ РАБОТЫ
                                            @endif
                                    @elseif($post instanceof \App\Models\Service)
                                        {{$post->title}}
                                    @endif

                                </h4>
                                <p class="searchSection__text md:!text-[16px]">
                                    @if($post instanceof \App\Models\Post)
                                        {!! $post->body  !!}
                                    @elseif($post instanceof \App\Models\News)
                                        {!! $post->content  !!}
                                    @elseif($post instanceof \App\Models\Team)
                                        {!! $post->body  !!}
                                    @elseif($post instanceof \App\Models\Review)
                                        {!! $post->body  !!}
                                    @elseif($post instanceof \App\Models\Contact)
                                        {!! $post->src !!}
                                    @endif
                                </p>

                            </div>
                        </div>
                        <div class="searchSection__dateBlock {{$post instanceof \App\Models\Service === true ? "mt-1.5" : ""}}">
                            @if($post instanceof \App\Models\News || $post instanceof \App\Models\Post)
                            <p class="searchSection__date"> {{$post->updated_at->format('d.m.Y')}}  </p>
                            @elseif($post instanceof \App\Models\Service)
                                <p class="searchSection__date text-base"> {{$post->price}}</p>
                            @elseif($post instanceof \App\Models\Review)
                                <p class="searchSection__date text-base">{{Carbon\Carbon::parse($post->published_at)->translatedFormat('d M. Y')}}</p>
                            @endif
                        </div>
                        <div class="searchSection__buttonBlock">
                            @if($post instanceof \App\Models\Post)
                                <a href="/post/{{$post->id}}" class="button float-right md:float-none">ПЕРЕЙТИ</a>
                                @elseif($post instanceof \App\Models\News)
                                <a href="/news/{{$post->id}}" class="button float-right md:float-none">ПЕРЕЙТИ</a>
                            @elseif($post instanceof \App\Models\Service)
                                <a href="{{ route('services') }}#{{$post->categories_id}}" class="button float-right md:float-none">ПЕРЕЙТИ</a>
                            @elseif($post instanceof \App\Models\Team)
                                <a href="/#team" class="button float-right md:float-none">ПЕРЕЙТИ</a>

                            @elseif($post instanceof \App\Models\Review)
                                <a href="https://yandex.ru/maps/org/volyavet/225599149948/reviews/" class="button float-right md:float-none">ПЕРЕЙТИ</a>
                            @elseif($post instanceof \App\Models\Contact)
                                @if($post->type === 'whatsapp')
                                <a href="https://{{$post->src}}" class="button float-right md:float-none">НАПИСАТЬ</a>
                                    @elseif($post->type === 'telegram')
                                    <a href="https://{{$post->src}}" class="button float-right md:float-none">НАПИСАТЬ</a>
                                    @elseif($post->type === 'number')
                                    <a href="tel:{{$post->src}}" class="button float-right md:float-none">ПОЗВОНИТЬ</a>
                                    @elseif($post->type === 'email')
                                    <a href="mailto:{{$post->src}}" class="button float-right md:float-none">НАПИСАТЬ</a>

                                    @elseif($post->type === 'viber')
                                    <a href="https://{{$post->src}}" class="button float-right md:float-none">НАПИСАТЬ</a>
                                @else
                                    <a href="/contacts" class="button float-right md:float-none">ПЕРЕЙТИ</a>
                                    @endif
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <script>
        function updateCategory(category) {
            var buttons = document.querySelectorAll('#list_buttons .sap__button');

            buttons.forEach(button => {
                if (button.classList.contains('active')) {
                    var input = document.querySelector('input[name="' + button.getAttribute('id') + '"]');
                    input.value = 'false';
                }
            });

            var currentButton = document.getElementById(category);
            var currentInput = document.querySelector('input[name="' + category + '"]');
            currentInput.value = 'true';

            document.querySelector('form#search').submit();
        }
    </script>

    </main>
@endsection
