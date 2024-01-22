<script setup>
import less from 'less';
import Telephone from '@/assets/svg/Telephone.svg';
import Address from '@/assets/svg/Address.svg';
import Email from '@/assets/svg/Email.svg';
import Clock from '@/assets/svg/Clock.svg';

const branch = $page.props.currentBranch;
const branches = $page.props.branches;

</script>

<template>
    <div class="contactSection">
        <div class="contactCol">
            <h4 class="contactTitle">Телефон для связи:</h4>
            <a :href="'tel:' + branch.phone" class="link contactText">
                <Telephone class="w-6"/>{{branch.phone ?? "Empty" }}
            </a>
        </div>
        <div class="contactCol">
            <h4 class="contactTitle">Ждем вас по адресу :</h4>
            <p class="contactText">
                <Address class="w-6 md:w-10"/>
                {{branch.address ?? "Empty" }}
            </p>
        </div>
        <div class="contactCol">
            <h4 class="contactTitle">Время работы :</h4>
            <p class="contactText">
                <Clock class="w-6 h-6"/>
                <span v-html="branch.work_time ?? 'Empty'"></span>
            </p>
        </div>
        <div class="contactCol">
            <h4 class="contactTitle">ПОЧТА :</h4>
            <a :href="'mailto:' + branch.email" class="link contactText">
                <Email class="w-6"/>{{branch.email ?? "Empty" }}
            </a>
        </div>
    </div>
</template>

<style scoped lang="less">
.contactSection {
    @media(min-width: 768px) {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    display: flex;
    flex-direction: column;
    .contactCol {

        @media(min-width: 768px) {
            width: calc(100% / 3);
            padding: 20px 25px;
        }
        @media(min-width: 1440px) {
            width: calc(100% / 4);
        }
        width: 100%;
        padding: 20px 0;
        .contactTitle {
            @media(min-width: 768px) {
                font-size: 20px;
                line-height: 130%;
                margin-bottom: 10px;
            }
            font-weight: 700;
            font-size: 14px;
            line-height: 130%;
            text-transform: uppercase;
            color: #f8f8f8;
            margin-bottom: 15px;
        }
        .contactText {
            @media(min-width: 768px) {
                font-size: 16px;
                line-height: 150%;
            }
            display: flex;
            gap: .5rem;
            font-weight: 400;
            font-size: 14px;
            line-height: 13px;
            color: #f8f8f8;
        }
    }
}
</style>
