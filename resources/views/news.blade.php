<?php

$page = \App\Models\Page::where('name', 'news')->first();
// $page->title
?>

{{--Str::words($post->body, 150)--}}
@extends('layouts.main',  ['title' => $post->title, 'description' => $post->description])

@section('main-container')

    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <a href="/library" class="link breadcrums__link">Библиотека</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">{{$post->title}}</p>
    </div>
    </div>
    <section class="postInfoSection">
        <div class="container">
            <div class="flex items-end justify-between">
{{--                <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px]">--}}
{{--                    {{$post->title}}--}}
{{--                </h3>--}}
                <h3 class="title title-withDot ml-0">
                    {{$post->h1}}
                </h3>
{{--                <h3 class="text-[#64C1C6] md:text-[35px]">{{$post->created_at_formatted}}</h3>--}}
            </div>
            <div class="postInfoSection__info">
                <div class="postInfoSection__row">
                    <div class="postInfoSection__left">
                        <img src="{{$post->getImage()}}" alt="" class="image image-br"/>
                    </div>
                    <div class="postInfoSection__right">
                        <p class="text text-m">
                            {!! nl2br(e($post->content)) !!}
                        </p>
                    </div>
                </div>
                {{--                {{$post->created}}--}}
                <span class="postInfoSection__date"></span>
                <a href="/library" class="button">Назад к статьям</a>
            </div>
        </div>


        @include('layouts.news');

    </section>

    </main>
@endsection
