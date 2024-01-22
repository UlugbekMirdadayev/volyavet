
<style>
    .error_input {
        border: 1px solid red!important;
        -webkit-box-shadow:0px 0px 6px 0px #ff0000;
        -moz-box-shadow:0px 0px 6px 0px #ff0000;
        box-shadow: 0px 0px 6px 0px #ff0000;
    }



</style>
<div id="registerFrame" class="registerFrame">
    <div class="content">
        <div class="decoration">
            <svg width="17" height="561" viewBox="0 0 17 561" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="9" y1="-8.45466e-09" x2="9" y2="248.783" stroke="#C6D4D3"/>
                <circle cx="8.5" cy="280.283" r="8" stroke="#D1FDFF"/>
                <line x1="9" y1="311.783" x2="9" y2="560.565" stroke="#C6D4D3"/>
            </svg>
        </div>
        <div class="form">
            <svg onclick="hideRegister()" style="z-index:99999999!important;" class="exit" width="21" height="22"
                 viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.81 21L1.92676 1M19.81 1L1.92676 21" stroke="#F8F8F8" stroke-width="2"
                      stroke-linecap="round"/>
            </svg>
            <div class="inp">
                <h1 class="title title-xl mb-4">Введите свои данные</h1>
                <p class="text mb-4">Оставьте свои данные и наш администратор свяжется с вами для уточнения всех деталей
                    записи в ближайшее время</p>
                <input id="user_name" placeholder="Ваше имя">
                <input id="user_phone_form" type="tel" placeholder="Телефон">
                <select id="user_city">
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" @if($branch->id === $current_branch->id)selected="selected"@endif>{{ $branch->title }}</option>
                    @endforeach
                </select>
                <textarea id="user_text" type="text" placeholder="Сообщение для администрации"></textarea>
                <button onclick="registerForm()" style="margin-bottom: 8px;text-transform: uppercase;">Записаться на приём</button>
                <a href="{{route('oferta')}}" class="md:pt-2.5 text-sm md:text bot text-start no-underline">Нажимая на кнопку "Записаться на приём", Вы соглашаетесь с <span class="underline">публичной офертой</span></a>
            </div>
            <div class="success flex flex-col">
                <h1 class="title title-xl text-left">Заявка принята</h1>
                <p class="text text-left">Наш администратор вскоре свяжется с вами для уточнения деталей </p>
                <button onclick="toMain()" style="    text-transform: uppercase;">На главную</button>
                <div class="image">
                    <img src="{{ Vite::asset('resources/img/dog.png') }}" alt="Dog"/>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

<script>


    $("#registerFrame").ready(() => {
        $("#registerFrame").on("click", (e) => {
            if (e.target.id == "registerFrame" && registerFrameState == "show") {
                hideRegister()
            }
        })
    })

    let registerFrameState = "hide";

    function toMain() {
        window.location.href = "/";
    }

    function registerFormSendRequest(name, phone, message, city) {
        $.ajax({
            method: "POST",
            url: "{{route('thanks')}}",
            data: {name, phone, message, city}
        }).done(function () {
            showSuccessFormRegister()
        });
    }

    // function registerForm() {
    //     const username = $("#user_name").val()
    //     const phone = $("#user_phone_form").val()
    //     const message = $("#user_text").val()
    //
    //     if (username !== "" && phone !== "" && message !== "") {
    //         registerFormSendRequest(username, phone, message)
    //     }
    // }

    function registerForm() {
        const username = $("#user_name").val();
        const phone = $("#user_phone_form").val();
        const city = $("#user_city").val();

// TODO DETERMINE CITY FROM BACKEND
        //const city = $("#user_city").val(2);
// TODO DETERMINE CITY FROM BACKEND

        let message = $("#user_text").val();
        const error_class = "error_input";
        // Сброс предыдущих подсветок полей
        $(".error").removeClass(error_class);
        if (message === "") {
            message = null;
        }
        if (username !== "" && phone !== "") {
            if (validatePhone(phone)) {
                registerFormSendRequest(username, phone, message, city);
            } else {
                $("#user_phone_form").addClass(error_class);
            }
        } else {
            if (username === "") {
                $("#user_name").addClass(error_class);
            }
            if (phone === "") {
                $("#user_phone_form").addClass(error_class);
            }

        }
    }
    function validatePhone(phone) {
        // Пример валидации номера телефона в формате +7 (999) 999-9999
        // Верните true, если номер валидный, и false в противном случае
        // В этом примере используется регулярное выражение для проверки формата номера
        const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{4}$/;
        return phoneRegex.test(phone);
    }
    function showSuccessFormRegister() {
        $("#registerFrame").css("overflow-y", "scroll");
        $("#registerFrame").css("visibility", "visible");
        $("#registerFrame").css("opacity", "1");
        const _svg = $("#registerFrame .content .decoration svg")
        $("#registerFrame .content").css("height", "579px");
        _svg.attr("height", "469");
        $("#registerFrame .content .form .inp").css("visibility", "hidden");
        $("#registerFrame .content .form .success").css("visibility", "visible");
    }

    function showRegister(id) {
        $("#registerFrame").css("overflow-y", "scroll");
        $("#registerFrame").css("visibility", "visible");
        $("#registerFrame").css("opacity", "1");
        $("#registerFrame").css("display", "flex");
        $('body').addClass('stop-scrolling')
        registerFrameState = "show"

        $('#registerFrame #user_city').val(id).trigger('change');
    }


    function hideRegister() {
        $("#registerFrame").css("overflow-y", "hidden");
        $("#registerFrame").css("opacity", "0");
        $("#registerFrame").css("display", "none");
        setTimeout(() => {
            $("#registerFrame").css("visibility", "hidden");
        }, 500)
        $('body').removeClass('stop-scrolling')
        registerFrameState = "hide"
    }

</script>

