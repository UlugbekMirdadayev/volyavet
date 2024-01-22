<script setup>

import less from 'less';
import EyeOn from '@/assets/svg/EyeOn.svg'

import {Link} from '@inertiajs/vue3';

const props = defineProps({
    headers: {
        type: Array,
        required: true,
    },
    rows: {
        type: Array,
    },
    services: {
        type: Boolean,
        required: false,
    },
    medCard: {
        type: Boolean,
    }
})



</script>
<template>
    <table class="table" :class="services ? 'tg' : 'medCard'" rows="">
        <thead>
        <tr>
            <th v-for="(header, index) in headers" :key="index" :class="index === headers.length - 1 ? 'last' : ''"
                class="px-4 py-2 text-lg">{{ header }}
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
            <td v-for="(value, colIndex) in row" :key="colIndex" class="sm:border border-[#888] px-5 py-3"
                v-if="!services"
                :class="colIndex === 'date' ? 'visibleMobile' : 'hiddenMobile'  + (row.idMedCard === value ? ' !hidden' : '')">
                <Link :href="route('reception.index', row.idMedCard)">{{ value }}
            </Link>
            </td>
            <td v-if="!services" class="sm:border border-[#888] px-5 py-3 content-cell hdnMobile">
                <Link :href="route('reception.index', row.idMedCard)"><EyeOn class="mx-auto"/></Link>
            </td>
            <td class="border px-4 py-2" v-if="services">{{ row.title }}</td>
            <td class="border px-4 py-2" v-if="services">{{ row.price }}</td>
        </tr>
        </tbody>
    </table>
</template>

<style scoped lang="less">

.hdnMobile {
    @media(min-width:540px) {
        display: none;
    }
}

.table {
    min-width: 100%;
    padding: 0;
    margin: 0;

    &.medCard {
        border-radius: 7px;
        overflow: hidden;
        border-collapse: collapse;

        thead {
            overflow: hidden;
            @media (min-width: 540px) {
                background: rgba(41, 53, 96, 0.38);
            }
            background: white;

            tr {
                @media (max-width: 540px) {
                    border-bottom: 1.5px solid #888;
                }

                th {

                    @media (min-width: 540px) {
                        border: 1.5px solid #888;
                    }

                    &:nth-child(1) {
                        @media (max-width: 540px) {
                            display: none;
                        }
                        display: table-cell;
                    }

                    &:nth-child(3) {
                        @media (max-width: 540px) {
                            display: none;
                        }
                        display: table-cell;
                    }

                    &:nth-child(4) {
                        @media (max-width: 540px) {
                            display: none;
                        }
                        display: table-cell;
                    }

                    &:last-child {
                        @media (max-width: 540px) {
                            display: table-cell;
                        }
                        display: none;
                    }
                }
            }
        }

        tbody {

            tr {

                @media (min-width: 540px) {
                    &:nth-child(even) {
                        background: rgba(41, 53, 96, 0.38);
                    }
                }

                &:nth-child(even) {
                    background: rgba(41, 53, 96, 0.15);
                }
                &:not(:hover) {
                    transition: .2s all;
                }
                &:hover {
                    transition: .25s all;
                    background: rgba(41, 53, 96, 0.25);
                }
                td,a {

                    color: black;
                    font-weight: 500;
                    &.visibleMobile {
                        text-align: center;
                    }

                    &.hiddenMobile {
                        @media (min-width: 540px) {
                            display: table-cell;
                        }
                        display: none;
                    }
                }
            }
        }
    }

    &.tg {
        border-collapse: unset;
        border-spacing: 12px;
        width: 100%;
        margin-bottom: 50px;

        td, th {
            background: rgba(61, 77, 137, .3);
            border: 1px solid #FFFFFF;
            border-radius: 10px;
            overflow: hidden;
            padding: 18px 10px;
            word-break: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 135%;
            text-align: center;
            color: #f8f8f8;
        }
    }
}

</style>
