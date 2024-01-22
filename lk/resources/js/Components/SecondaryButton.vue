<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    type: {
        type: String,
        default: 'button',
    },
    href: {
        type: String,
        default: '',
    }
});

</script>

<template>

    <button v-if="href.length === 0"
        :type="type"
        class="inline-flex items-center px-7 py-[22px] bg-white border-2 border-[#D1FDFF] rounded-[7px]
        font-semibold text-[16px] h-[50px] text-[#D1FDFF] uppercase bgSecondary tracking-widest shadow-sm hover:bg-[#3D4D89]
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25
        transition ease-in-out duration-150"
    >
        <slot />
    </button>
    <Link v-else :href="href" class="inline-flex items-center px-7 py-[22px] bg-white border-2 border-[#D1FDFF] rounded-[7px]
        font-semibold text-[16px] h-[50px] text-[#D1FDFF] uppercase bgSecondary tracking-widest shadow-sm hover:bg-[#3D4D89]
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25
        transition ease-in-out duration-150">
        <slot />
    </Link>
</template>

<style>
.bgSecondary {
    background: rgba(209, 253, 255, 0.30);
}
</style>
