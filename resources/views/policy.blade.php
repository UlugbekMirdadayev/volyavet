
<?php
$page = \App\Models\Page::where('name', 'policy')->first();
?>

@extends('layouts.main',  ['title' => $page->title, 'description' => $page->description])
@section('main-container')

    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">{{$page->title}}</p>
    </div>
    </div>

    <section class="offertaSection">
        <div class="container">
            <h3 class="title title-withDot ml-0 md:ml-[50px] lg:ml-[75px] sm:w-[400px] w-[75%] lg:w-[600px]" style="font-family: GothamPro_bold;">
                {{$page->h1}}</h3>

            {!! File::get('policy.html') !!}

        </div>
    </section>

    </main>
@endsection
