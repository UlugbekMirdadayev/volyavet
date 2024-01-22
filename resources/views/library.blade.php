<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>
<script>
    function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            tabcontent[i].className = "library__wrapper tabcontent";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(
                " button__category-active",
                ""
            );
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "flex";
        evt.currentTarget.className += " button__category-active";
    }
</script>
@section('other')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
    />

@endsection

<?php
$page = App\Models\Page::where('name', 'library')->first();


?>
@extends('layouts.main',  ['title' => $page->title, 'description' => $page->description])

@section('main-container')

    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">{{ $page->title }}</p>
    </div>
    </div>
    <section class="library">
        <div class="container library__container">

            <h2 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px]">{{$page->h1}}</h2>
            <div class="library__buttons">
                <button
                    class="button__category tablinks uppercase"
                    onclick="openTab(event, 'video')" @if(isset($videos) && count($videos) > 0)  @else disabled style="    background: #222946;" @endif
                >
                    <svg
                        width="19"
                        height="12"
                        viewBox="0 0 23 15"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M22.4435 2.025C22.2738 1.92806 22.0821 1.87712 21.8871 1.87712C21.6921 1.87712 21.5004 1.92806 21.3306 2.025L17.8065 4.05938C17.787 2.97754 17.3488 1.94651 16.5859 1.18757C15.823 0.428636 14.7962 0.00227553 13.7258 0H1.85484C1.36366 0.00246417 0.893286 0.200799 0.545963 0.551897C0.19864 0.902995 0.00243767 1.37848 0 1.875V10.875C0 11.969 0.429924 13.0182 1.19519 13.7918C1.96046 14.5654 2.99839 15 4.08065 15H15.9516C16.4428 14.9975 16.9132 14.7992 17.2605 14.4481C17.6078 14.097 17.804 13.6215 17.8065 13.125V10.9406L21.3306 12.975C21.4994 13.0748 21.6916 13.1266 21.8871 13.125C22.0827 13.1275 22.2752 13.0756 22.4435 12.975C22.6122 12.8755 22.7523 12.7332 22.8498 12.5622C22.9474 12.3912 22.9992 12.1974 23 12V3C22.9992 2.80259 22.9474 2.60881 22.8498 2.43781C22.7523 2.26681 22.6122 2.12452 22.4435 2.025ZM15.5806 12.75H4.08065C3.58946 12.7475 3.11909 12.5492 2.77177 12.1981C2.42445 11.847 2.22824 11.3715 2.22581 10.875V2.25H13.7258C14.217 2.25246 14.6874 2.4508 15.0347 2.8019C15.382 3.153 15.5782 3.62848 15.5806 4.125V12.75ZM20.7742 10.0594L17.8065 8.34375V6.65625L20.7742 4.94062V10.0594Z"
                            fill="#F8F8F8"
                        />
                    </svg>
                    Видео
                </button>
                <button
                    class="button__category button__category-active tablinks uppercase"
                    onclick="openTab(event, 'post')"
                >
                    <svg
                        width="12"
                        height="15"
                        viewBox="0 0 15 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M1.875 0.5C1.37772 0.5 0.900805 0.689642 0.549175 1.02721C0.197544 1.36477 0 1.82261 0 2.3V16.7C0 17.1774 0.197544 17.6352 0.549175 17.9728C0.900805 18.3104 1.37772 18.5 1.875 18.5H13.125C13.6223 18.5 14.0992 18.3104 14.4508 17.9728C14.8025 17.6352 15 17.1774 15 16.7V5.9L9.375 0.5H1.875ZM1.875 2.3H8.4375V6.8H13.125V16.7H1.875V2.3ZM3.75 9.5V11.3H11.25V9.5H3.75ZM3.75 13.1V14.9H8.4375V13.1H3.75Z"
                            fill="#F8F8F8"
                        />
                    </svg>
                    Статьи
                </button>
            </div>
            <div class="library__wrapper tabcontent" id="video">
                @foreach($videos as $video)
                    <div class="card">
                        <a data-fancybox data-type="iframe" data-src="{{$video->link}}" href="javascript:;" class="no-underline">
                            <img src="{{$video->getImage()}}" alt="" class="card__image image"/>
                            <div class="card__content">
                                <p class="text-s">{{$video->title}}</p>
                                {{--                        <p class="text-s date">16.06.23</p>--}}
                                <a data-fancybox data-type="iframe" data-src="{{$video->link}}" href="javascript:;" class="button newsSection__hoverButton">Смотреть
                                    видео</a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="library__wrapper tabcontent tabcontentpost" id="post">
                @foreach($posts as $post)
                    <div class="card">
                        <a href="{{route('post', $post->id)}}" class="no-underline">
                            <img src="{{$post->getImage()}}" alt="" class="card__image image"/>
                            <div class="card__content">
                                <p class="text-s">{{$post->title}}</p>
{{--                                <p class="text-s date">{{$post->created_at_formatted}}</p>--}}
                                <a href="{{route('post', $post->id)}}" class="button newsSection__hoverButton">Читать
                                    статью</a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @if(!Request::has('getAll'))
                <a href="?getAll" class="button">показать больше</a>

            @endif
        </div>
    </section>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    @endpush
    <script>
        $(document).ready(function () {
            $('.video-link').click(function (e) {
                e.preventDefault();
                var videoUrl = $(this).attr('href'); // Получение ссылки на видео из атрибута href

                // Проверка формата ссылки
                if (isYouTubeLink(videoUrl)) {
                    // Если ссылка YouTube, парсим и отображаем видео
                    var youtubeId = parseYouTubeId(videoUrl);
                    videoUrl = 'https://www.youtube.com/embed/' + youtubeId;

                } else if (isMP4Link(videoUrl)) {
                    // Если ссылка на .mp4, показываем видео
                    videoUrl = videoUrl;

                } else {
                    // Если формат не поддерживается, выводим сообщение об ошибке
                    console.log('Неподдерживаемый формат видео');
                    return;
                }

                // Отображение видео в Fancybox
                $.fancybox.open({
                    src: videoUrl,
                    type: 'video',
                    opts: {
                        // Параметры настройки Fancybox, если необходимо
                        youtube: {
                            controls: 1,
                            showinfo: 0,
                            autoplay: 1,
                            fullscreen: 1
                        },
                        vimeo: {
                            color: 'f00'
                        }
                    }
                });
            });

            // Функция для проверки формата ссылки YouTube
            function isYouTubeLink(url) {
                // Регулярное выражение для проверки ссылки YouTube
                var regex = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+/;
                return regex.test(url);
            }

            // Функция для парсинга и получения идентификатора видео YouTube
            function parseYouTubeId(url) {
                // Регулярное выражение для получения идентификатора видео YouTube
                var regex = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.?be)\/(?:watch\?v=|embed\/|v\/|\.be\/)([^\s&?\/]+)/;
                var match = url.match(regex);
                if (match && match[1]) {
                    return match[1];
                } else {
                    return null;
                }
            }

            // Функция для проверки формата ссылки на .mp4
            function isMP4Link(url) {
                // Регулярное выражение для проверки ссылки на .mp4
                var regex = /^.+\.mp4$/;
                return regex.test(url);
            }
        });
    </script>


    @include('layouts.form')

        </main>
        @endsection
