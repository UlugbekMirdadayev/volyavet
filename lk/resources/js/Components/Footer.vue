<script setup>

import Telegram from '@/assets/svg/telegram.svg';
import Viber from '@/assets/svg/viber.svg';
import ArrowTop from '@/assets/svg/ArrowUp.svg'
import Container from "@/Components/Container.vue";
import {ref} from "vue";
import {usePage, Link} from "@inertiajs/vue3";

const scrollTop = () => {
    window.scrollTo(0, 0);
}
const page = usePage();
const currentBranch = page.props.currentBranch;
const madeByDefault = ref('Никита');
const madeBy = ref('Никита');

const changeMadeBy = () => madeBy.value === madeByDefault.value ? madeBy.value = 'nik-skolkovo@yandex.ru' : madeBy.value = madeByDefault.value

</script>


<template>
    <footer class="footer">
        <Container>
            <div class="footer__row">
                <div class="footer__col footer__colOfferta">
                    <a :href="route('oferta')" class="link">Публичная оферта</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/#news" class="link">Новости и акции</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/aboutUs" class="link">О нас</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/services" class="link">Цены и услуги</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/library" class="link">Библиотека</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/#team" class="link">Наша команда</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/#feedback" class="link">Отзывы</a>
                </div>
                <div class="footer__col">
                    <a href="https://volyavet.ru/contacts" class="link">Контакты</a>
                </div>
                <div class="footer__col footer__colArrow">
                    <div class="footer__socLinks">
                        <a target="_blank" :href="'https://' + currentBranch.telegram" aria-label="Telegram"
                        ><Telegram /></a>
                        <a target="_blank" :href="'https://' + currentBranch.whats_up" aria-label="WhatsApp">
                            <Viber />
                        </a>
                    </div>
                    <a href="#app" aria-label="MoveBody" class="footer__arrowTop">
                        <ArrowTop />
                    </a>
                </div>
            </div>
            <div class="footer__row">
                <div class="footer__col footer__colRights-desctop">
                    <p class="text">Все права защищены © 2023</p>
                </div>
                <div class="text-center mt-8 md:w-[560px]">
                    <a :href="route('policy')" class="text-white">Политика конфиденциальности сайта клиники Volyavet и условия обработки пользователями персональных данных, размещенных на сайте</a>
                </div>

                <div class="footer__col">
                    <p class="text">
                        Сайт разработал <span id="madeNikita" class="underline text-[#d1fdff] cursor-pointer">Никита</span>
                    </p>
                </div>
            </div>
        </Container>
    </footer>
</template>

<style lang="less">

</style>
