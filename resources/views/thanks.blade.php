@extends('layouts.main',  ['title' => 'Спасибо', 'description' => 'Спасибо'])

@section('main-container')

    <div class="breadcrums">
        <a href="/" class="link breadcrums__link">Главная</a>
        <hr class="breadcrums__hr">
        <p class="breadcrums__text">Спасибо</p>
    </div>
    </div>

    <section class="notFound">
        <div class="notFound__row">
            <div class="notFound__col">
                <img src="../../img/404_1.jpg" alt="" class="image image-tr" />
            </div>
            <div class="notFound__col notFound__main">
                <p class="text">
                    Заявка принята!
                </p>
                <h2 class="title">Спасибо</h2>
                <a href="/" class="button">На главную</a>
            </div>
            <div class="notFound__col">
                <img src="../../img/404_2.jpg" alt="" class="image image-bl" />
            </div>
        </div>
    </section>


    </main>

@endsection
