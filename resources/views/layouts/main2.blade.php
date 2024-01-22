@include('layouts.header-main', ['title' =>  $title ?? 'Ветеринарная клиника VoLYAVET', 'description' =>   $description ?? 'Когда здоровье вашего питомца важнее всего остального' ])
@include("layouts.new_headerline")
@yield('main-container')

@include('layouts.footer')
@include('layouts.registerForm')
