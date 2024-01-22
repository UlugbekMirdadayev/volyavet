<?php

$branch = \App\Services\BranchService::current();

?>

<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__col footer__colOfferta">
                <a href="{{route('oferta')}}" class="link">Публичная оферта</a>
            </div>
            <div class="footer__col">
                <a href="/#news" class="link">Новости и акции</a>
            </div>
            <div class="footer__col">
                <a href="/aboutUs" class="link">О нас</a>
            </div>
            <div class="footer__col">
                <a href="/services" class="link">Цены и услуги</a>
            </div>
            <div class="footer__col">
                <a href="/library" class="link">Библиотека</a>
            </div>
            <div class="footer__col">
                <a href="/#team" class="link">Наша команда</a>
            </div>
            <div class="footer__col">
                <a href="/#feedback" class="link">Отзывы</a>
            </div>
            <div class="footer__col">
                <a href="/contacts" class="link">Контакты</a>
            </div>
            <div class="footer__col footer__colArrow">
                <div class="footer__socLinks">
                    <a target="_blank" href="https://{{$branch->telegram}}" aria-label="Telegram"
                    ><img src="{{ Vite::asset('resources/img/telegram.svg') }}" width="30" height="30" alt="Telegram"
                          class="icon"
                        /></a>
                    <a target="_blank" href="https://{{$branch->whats_up}}" aria-label="WhatsApp"><img
                            src="{{ Vite::asset('resources/img/viber.svg') }}" width="30" height="30" alt="Whats App"
                            class="icon"/></a>
                </div>
                <a href="#body" aria-label="MoveBody" class="footer__arrowTop"
                ><img src="{{ Vite::asset('resources/img/arrowtop.svg') }}" width="50" height="50" alt="Arrow Top"
                      class="icon"
                    /></a>
            </div>
        </div>
        <div class="footer__row">
            <div class="footer__col footer__colRights-desctop">
                <p class="text">Все права защищены © 2023</p>
            </div>
            <div class="text-center mt-8 md:w-[560px]">
                <a href="{{route('policy')}}" class="text-white">Политика конфиденциальности сайта клиники Volyavet и условия обработки пользователями персональных данных, размещенных на сайте</a>
            </div>

            <div class="footer__col">
                <p class="text">
                    Сайт разработал <span id="madeNikita" class="underline text-[#d1fdff] cursor-pointer">Никита</span>
                </p>
            </div>
        </div>
    </div>
</footer>

{{--	<script src="js/lib.min.js"></script>--}}
<!-- ✅ load jQuery ✅ -->
<script>
    function showAllSymptoms() {
        const hiddenSymptoms = document.querySelectorAll('.whenSection__item.hidden-on-mobile');
        hiddenSymptoms.forEach(s => s.style.display = 'block');
        document.querySelector('.whenSection__allButton').style.display = 'none';
    }


</script>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>

<!-- ✅ load Slick, jQuery ✅ -->

<script
    type="text/javascript"
    src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
></script>
<script src="{{asset('/js/jquery.mask.js')}}"></script>
<script src="../../js/main.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('input#user_phone, input#user_phone_contact, input#user_phone_form').off('click').one('click', function (e) {
            // put your logic in here
            console.log('hello')
            e.target.value = '+7 ';
        });

        var options = {
            selectOnFocus: true,
            onClick: function (e) {
                console.log(e)
            }
        }
        $('input#user_phone').mask('+7 (000) 000-0000', options);
        $('input#user_phone_contact').mask('+7 (000) 000-0000', options);
        $('input#user_phone_form').mask('+7 (000) 000-0000', options);

    })

    var NikitaClicked = false;
    $('span#madeNikita').on('click', () => {
        if (NikitaClicked) {
            NikitaClicked = false;
            $('span#madeNikita').text('Никита');
            return 0;
        }
        $('span#madeNikita').text('nik-skolkovo@yandex.ru');
        // nik-skolkovo@yandex.ru
        NikitaClicked = true;

    });
</script>
@stack('js')

</body>
</html>
