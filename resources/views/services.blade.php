
<?php
$page = \App\Models\Page::where('name', 'services')->first();
$first_cat = \App\Models\Category::where('status', 1)->first();
?>

@extends('layouts.main',  ['title' => $page->title, 'description' => $page->desctiption])

@section('main-container')
    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">{{ $page->title }}</p>
    </div>
    </div>
    <section class="servicesAndPrice">
        <div class="container">
            <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px]">{{ $page->h1 }}</h3>
            <div class="servicesAndPrice__row">
                <div class="servicesAndPrice__left grid gap-4 grid-cols-2 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-1 xl:auto-rows-max 2xl:h-[50px]">
                    @php

                        $categories = DB::table('categories')->get();
                    @endphp
                    @foreach($categories as $index=>$cat)
                        <button class="sap__button @if($cat->status === $first_cat->status) active @endif" id="{{$cat->id}}">{{$cat->title}}</button>
                    @endforeach
                </div>
                <div class="servicesAndPrice__right">
                    <h3 class="servicesAndPrice__title">{{$first_cat->title}}</h3>
                    <p class="text" id="text">
                        {{nl2br(e($first_cat->description))}}
                    </p>
                    <img
                        id="imagePreview"
                        src="{{ $first_cat->getImage() ?? "../../img/servicesAndPrice.jpg" }}"
                        alt=""
                        class="image servicesAndPrice__image"
                    />
                    <table class="tg">
                        <thead>
                        <tr>
                            <th class="tg-0lax">Название услуги</th>
                            <th class="tg-baqh">Цена, ₽</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($first_cat->services()->get() as $service)
                            <tr>
                                <td class="tg-0lax">{{$service->title}}</td>
                                <td class="tg-0lax">-</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="servicesAndPrice__bottomRow">
                        <p class="text">
                            Стоимость услуг на сайте не является публичной офертой и может
                            отличаться от цен прейскуранта
                        </p>
                        <button class="button" onclick="showRegister({{ $current_branch->id }});">Записаться на приём</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@push('js')
<script>
    $(document).ready(function() {
        // получаем хэштег из URL
        var hashtag = window.location.hash;

        // если хэштег присутствует
        if (hashtag) {
            // удаляем символ '#' из хэштега
            var categoryHash = hashtag.slice(1);

            // находим кнопку с идентификатором, соответствующим хэштегу
            var activeButton = $('#' + categoryHash);
            $('.sap__button[id=1]').removeClass('active');
            // если кнопка существует, делаем ее активной и выполняем соответствующие действия
            if (activeButton.length) {
                activeButton.addClass('active');
                loadCategory(categoryHash);
            }
        }

        // обработчики клика на кнопки категорий
        $('.sap__button').on('click', function(e) {
            e.preventDefault();
            var buttonId = $(this).attr('id');

            // изменяем хэштег в URL
            window.location.hash = buttonId;

            // загружаем и отображаем выбранную категорию
            loadCategory(buttonId);

            // делаем выбранную категорию активной
            $('.sap__button').removeClass('active');
            $('#' + buttonId).addClass('active');
        });

        // функция для загрузки и отображения категории
        function loadCategory(categoryId) {
            // отправляем запрос на получение категории и услуг по ее идентификатору и обновляем содержимое страницы
            $.ajax({
                url: "category/" + categoryId,
                type: 'GET',
                success: function(response) {
                    var category = response.category;
                    var services = response.services;

                    // изменяем заголовок и описание категории
                    $('img#imagePreview').attr('src', category.image)
                    $('.servicesAndPrice__title').text(category.title);
                    $('.servicesAndPrice__right #text').html(category.description.replace(/\\n/g,"<br>"));

                    // обновляем таблицу с услугами для выбранной категории
                    var tableBodyHtml = '';
                    $.each(services, function(index, service) {
                        tableBodyHtml += '<tr>';
                        tableBodyHtml += '<td class="tg-0lax">' + service.title + '</td>';
                        tableBodyHtml += '<td class="tg-0lax">-</td>';
                        tableBodyHtml += '</tr>';
                    });
                    $('.servicesAndPrice__right .tg tbody').html(tableBodyHtml);
                }
            });
        }
    });

</script>
@endpush
    </main>
@endsection
