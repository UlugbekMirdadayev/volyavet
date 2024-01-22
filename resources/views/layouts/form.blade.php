<section class="feedbacksection" id="feedback_form">
    <div class="container">
        <div class="block lg:hidden">
            <h3 class="title title-withDot">Предварительная запись</h3>
            <p class="text p-8 pl-0 pb-0 md:pb-8">
                Оставьте свои данные и наш администратор свяжется с вами для уточнения
                всех деталей записи в самое ближайшее время
            </p>
        </div>
        <div class="feedbacksection__row">

            <div class="feedbacksection__left">
                <picture>
                    <source srcset="{{ Vite::asset('resources/img/feedback.webp') }}" type="image/webp">

                    <img src="{{ Vite::asset('resources/img/feedback.png') }}" alt="Doggy Form" class="image image-br md:float-right" width="auto" height="auto"/>
                </picture>
            </div>
            <div class="feedbacksection__right">
                <div class="hidden lg:block">
                    <h3 class="title title-withDot">Предварительная запись</h3>
                    <p class="custom_text p-8">
                        Оставьте свои данные и наш администратор свяжется с вами для уточнения
                        всех деталей записи в самое ближайшее время
                    </p>
                </div>
                <form class="feedbacksection__form" method="post" action="{{route('thanks')}}">
                    @csrf
                    <div class="lg:grid gap-4 mb-6 md:grid-cols-2 mt-4">

                        <div class="flex flex-wrap mr-4 w-full content-between">
                            <input type="text" name="name" class="input" placeholder="Ваше имя" required/>
                            <input type="tel" name="phone" id="user_phone" class="input" placeholder="Телефон" required/>
                            <select id="user_city" name="city" required>
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $branch->id === \App\Services\BranchService::current()->id ? 'selected="selected"' : '' }}>
                                    {{ $branch->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <textarea
                            name="message"
                            id=""
                            cols="25"
                            rows="5"
                            class="input"
                            placeholder="Сообщение для администратора"
                        ></textarea>

                    </div>
                    <div class="flex flex-col-reverse lg:flex-row">
                        <div class="text-[#BCCED0] max-w-full md:max-w-[290px]">
                            <a href="{{route('oferta')}}" class="text-[#BCCED0] no-underline">Нажимая на кнопку "Записаться на приём", Вы соглашаетесь с публичной офертой</a>
                        </div>
                        <button class="button w-full lg:w-auto" type="submit">Записаться на приём</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
