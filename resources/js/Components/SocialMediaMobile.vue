<script setup>
import Telegram from '@/assets/svg/Telegram.svg';
import WhatsApp from '@/assets/svg/WhatsApp.svg'
</script>

<template>
    <div class="subHeader">
        <div class="socialMedia">
            <a :href="'https://'+$page.props.contacts.telegram" aria-label="Telegram">
                <Telegram class="w-[30px]"/>
            </a>
            <a :href="'https://'+$page.props.contacts.whatsapp" aria-label="WhatsApp">
                <WhatsApp class="w-[30px]"/>
            </a>
        </div>
    </div>
</template>

<style lang="less">

.subHeader {
    @media (min-width: 990px) {
        display: none;
        margin-bottom: 30px;
    }
    display: flex;
    align-items: center;
    justify-content: center;
    width: calc(100% - 32px);
    border-bottom: 1px solid #d1fdff;
    margin: 15px auto 20px;
    position: relative;

    .socialMedia {
        position: absolute;
        display: flex;
        gap: 15px;
        padding: 0 15px;
        background: #2B3763;

        & > a {
            display: flex;
            justify-content: center;
            border-radius: 50%;
        }
    }
}

</style>
