<?php
$page = \App\Models\Page::where('name', 'contacts')->first();

$branch = \App\Services\BranchService::current();
$branches = \App\Services\BranchService::getList();

?>

@extends('layouts.main',  ['title' => $page->title, 'description' => $page->description])

@section('main-container')

    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">Контакты</p>
    </div>

    <style>
        .contact_switcher {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        .contact_switcher_button {
            width: 177px;
            color: #D1FDFF;
            border: 2px solid #D1FDFF;
            border-radius: 10px;
            text-align: center;
            padding-top: 13px;
            padding-bottom: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            z-index: 1;
            text-transform: uppercase;
        }

        .contact_switcher_last {
            position: relative;
            margin-left: -10px;
        }


        @media (max-width: 1250px) {
            .contact_switcher_button {
                width: 100%;
                margin-bottom: 10px;
            }

            .contact_switcher_last {
                margin-left: 0;
            }

        }

        .contact_switcher_button.is_active {
            border: 2px solid #3D4C87;
            background-color: #3D4C87;
            z-index: 2;
        }

        .contact_branches_wrapper {
            margin-top: 40px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .contact_branch {
            background-color: #3D4C87;
            border-radius: 10px;
            color: #F8F8F8;
            width: 260px;
            padding: 20px;
            font-size: 13px;
            font-weight: 400;
            margin: 1em;
        }

        .contact_branch_info {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
        }

        .contact_branch div {
            padding-bottom: 8px;
        }

        .contact_branch div img {
            height: 16px;
            padding-right: 5px;
        }

        .contact_branches_map_wrapper {
            margin-top: 50px;
            display: none;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .contact_branches_map_wrapper .branches {
            max-height: 400px;
            overflow-y: scroll;
        }

        .contact_branch_change_location {
            cursor: pointer;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 20px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #2b3763;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #596281;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #596281;
        }
    </style>

    <section class="contactsSection">
        <div class="container">
            <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px]">
                Контакты</h3>

            <div class="contact_switcher">
                <div class="contact_switcher_button contact_switcher__list is_active">Список</div>
                <div class="contact_switcher_button contact_switcher__map contact_switcher_last">Карта</div>
            </div>

            <div class="contact_branches_wrapper">
                @foreach($branches as $branch)
                    <div class="contact_branch">
                        <div class="contact_branch_info">
                            <div><img src="{{ Vite::asset('resources/img/branch.png') }}" alt="Филиал"></div>
                            <div>{{ $branch->title }}</div>
                        </div>
                        <div class="contact_branch_info">
                            <div><img src="{{ Vite::asset('resources/img/locationIcon.svg') }}"></div>
                            <div>{{ $branch->address }}</div>
                        </div>
                        @if($branch->metro)
                        <div class="contact_branch_info">
                            <div><img src="{{ Vite::asset('resources/img/metro.png') }}"></div>
                            <div>{{ $branch->metro }}</div>
                        </div>
                        @endif
                        <div class="contact_branch_info">
                            <div><img src="{{ Vite::asset('resources/img/telIcon.svg') }}"></div>
                            <div>{{ $branch->phone }}</div>
                        </div>
                        <div class="contact_branch_info">
                            <div><img src="{{ Vite::asset('resources/img/work_time.png') }}"></div>
                            <div>{{ strip_tags($branch->work_time) }}</div>
                        </div>
                        <div class="contact_branch_info">
                            <div><img src="{{ Vite::asset('resources/img/mail.png') }}"></div>
                            <div>{{ $branch->email }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="contact_branches_map_wrapper">
                <div class="branches">
                    @foreach($branches as $branch)
                        <div class="contact_branch contact_branch_change_location" data-coordx="{{ $branch->lat }}" data-coordy="{{ $branch->long }}">
                            <div class="contact_branch_info">
                                <div><img src="{{ Vite::asset('resources/img/branch.png') }}" alt="Филиал"></div>
                                <div>{{ $branch->title }}</div>
                            </div>
                            <div class="contact_branch_info">
                                <div><img src="{{ Vite::asset('resources/img/locationIcon.svg') }}"></div>
                                <div>{{ $branch->address }}</div>
                            </div>
                            @if($branch->metro)
                            <div class="contact_branch_info">
                                <div><img src="{{ Vite::asset('resources/img/metro.png') }}"></div>
                                <div>{{ $branch->metro }}</div>
                            </div>
                            @endif
                            <div class="contact_branch_info">
                                <div><img src="{{ Vite::asset('resources/img/telIcon.svg') }}"></div>
                                <div>{{ $branch->phone }}</div>
                            </div>
                            <div class="contact_branch_info">
                                <div><img src="{{ Vite::asset('resources/img/work_time.png') }}"></div>
                                <div>{{ strip_tags($branch->work_time) }}</div>
                            </div>
                            <div class="contact_branch_info">
                                <div><img src="{{ Vite::asset('resources/img/mail.png') }}"></div>
                                <div>{{ $branch->email }}</div>
                            </div>
                            <div style="text-align: center">
                                <button class="button" onclick="showRegister({{ $branch->id }})"
                                        style="padding: 0 10px;">Записаться к врачу
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="position:relative;overflow:hidden; margin-top: 10px; margin-left: 20px; width: 70%">
                    <!--iframe class="contactsSection__map"
                            src="https://yandex.ru/map-widget/v1/?ll=37.414378%2C55.916983&mode=poi&poi%5Bpoint%5D=37.414528%2C55.917060&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D225599149948&tilt=0.8726646259971648&z=19.49"
                            width="560"
                            height="400" style="min-height: 400px;">

                    </iframe-->

                    <div id="map" style="width: 100%; height: 400px"></div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.form')

    </main>
@endsection


@push('js')
    <script>
        $(document).ready(function () {
            $('.contact_switcher div').click(function () {
                $('.contact_switcher div').removeClass('is_active');

                const el = $(this);

                el.addClass('is_active');

                if (el.hasClass('contact_switcher__list')) {
                    $('.contact_branches_wrapper').show();
                    $('.contact_branches_map_wrapper').css('display', 'none');
                } else {
                    $('.contact_branches_wrapper').hide();
                    $('.contact_branches_map_wrapper').css('display', 'flex');
                }
            });

            let myMap;

            $('.contact_branch_change_location').click(function () {
                const el = $(this);
                myMap.setCenter([el.data('coordx'), el.data('coordy')]);
            });

            ymaps.ready(function () {
                myMap = new ymaps.Map("map", {
                        center: [{{ $branches[0]->lat }}, {{ $branches[0]->long }}],
                        zoom: 16
                    }, {
                        searchControlProvider: 'yandex#search'
                    });

                @foreach($branches as $branch)
                    myMap.geoObjects.add(new ymaps.GeoObject({
                        geometry: {
                            type: "Point",
                            coordinates: [{{ $branch->lat }}, {{ $branch->long }}]
                        }
                    }, {
                        preset: 'islands#redIcon'
                    }));
                @endforeach
            });
        });
    </script>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=ee9f03d0-19bc-4f75-bbd0-cb035bc5f2f2&lang=ru_RU"
            type="text/javascript">
@endpush
