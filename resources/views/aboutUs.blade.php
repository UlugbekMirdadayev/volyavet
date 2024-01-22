<?php
$page = \App\Models\Page::where('name', 'aboutUs')->first();
$aboutus = \App\Models\AboutUs::query()->where(['branch_id' => \App\Services\BranchService::current()->id])->first();
?>

@extends('layouts.main',  ['title' => $page->title, 'description' => $page->description])


@section('main-container')

    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">{{$page->title}}</p>
    </div>
    </div>
    <section class="aboutSection">
        <div class="container aboutSection__container">
            <div class="aboutSection__left">
                <img src="../../img/about-line.png" alt="" class="aboutSection__line"/>
                <h2 class="title title-xl">{!! $page->h1 !!}</h2>
                <p class="text text-xs xl:text-base">{!! $page->content !!}</p>

                <div class="pl-0 textGroup ">
                    <div class="text text-s !text-xs md:!text-base">
                        Профессиональные<br/>
                        врачи с огромным<br/>
                        опытом
                    </div>
                    <div class="text text-s !text-xs md:!text-base">
                        Новое<br/>
                        современное<br/>
                        оборудование
                    </div>
                    <div class="text text-s !text-xs md:!text-base">
                        Безграничная<br/>
                        любовь и забота<br/>
                        о животных
                    </div>
                </div>
                <div class="aboutSection__ourMission">
                    <div class="text text-xl">
                        НАША миссия:
                        <hr class="ml-3 aboutSection__hr"/>
                    </div>
                    <p class="text text-xs">
                        Вывести качество жизни людей и их питомцев на новый уровень,
                        предоставляя услуги ветеринарной помощи безупречного качества при
                        высоком уровне сервиса, прозрачности процессов <br> и с заботой как о
                        питомце, так и о клиенте.
                    </p>
                </div>
            </div>
            <div class="aboutSection__right">
                @if ($aboutus->getImage('main_image'))
                    <img
                        src="{{$aboutus->getImage('main_image')}}"
                        alt=""
                        class="image image-bl aboutSection__img-big"
                    />
                @endif
                @if ($aboutus->getImage('second_image'))
                    <img
                        src="{{$aboutus->getImage('second_image')}}"
                        alt=""
                        class="image aboutSection__img-small"
                    />
                @endif
                @if ($aboutus->getImage('third_image'))
                    <img
                        src="{{$aboutus->getImage('third_image')}}"
                        alt=""
                        class="image aboutSection__img-small"
                    />
                @endif
                @if ($aboutus->getImage('fourth_image'))
                    <img
                        src="{{$aboutus->getImage('fourth_image')}}"
                        alt=""
                        class="image aboutSection__img-small"
                    />
                @endif
            </div>
        </div>
    </section>

    <section class="weHelp">
        <div class="container weHelp__container">
            <h2 class="title title-withDot">Каким животным мы помогаем</h2>
            <p class="text pl-10">
                Наша ветеринарная клиника многопрофильная, поэтому для любого вашего
                питомца мы подберём того врача, который знает, как найти к нему подход и
                сможет назначить подходящее лечение
            </p>
            <div class="weHelp__cardsWrapper">
                <div class="weHelp__card">
                    <img src="../../img/cat.jpg" alt="" class="image"/>
                    <p class="text text-xs !text-2xl lg:!text-3xl">кошки</p>
                </div>
                <div class="weHelp__card">
                    <img src="../../img/dog.jpg" alt="" class="image"/>
                    <p class="text text-xs !text-2xl lg:!text-3xl">собаки</p>
                </div>
                <div class="weHelp__card">
                    <img src="../../img/rabbit.jpg" alt="" class="image"/>
                    <p class="text text-xs !text-2xl lg:!text-3xl">кролики</p>
                </div>
                <div class="weHelp__card">
                    <img src="../../img/mouse.jpg" alt="" class="image"/>
                    <p class="text text-xs !text-2xl lg:!text-3xl">мыши</p>
                </div>
                <div class="weHelp__card">
                    <img src="../../img/hamster.jpg" alt="" class="image"/>
                    <p class="text text-xs !text-2xl lg:!text-3xl">хомяки</p>
                </div>
                <div class="weHelp__card">
                    <img src="../../img/ferret.jpg" alt="" class="image"/>
                    <p class="text text-xs !text-2xl lg:!text-3xl">хорьки</p>
                </div>
            </div>
        </div>
    </section>


    @include('layouts.form')
    </main>
@endsection
