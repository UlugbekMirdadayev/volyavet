
<script setup>
import {Link} from '@inertiajs/vue3';

defineProps({
    type: {
        type: String,
        default: 'button',
    },
    href: {
        type: String,
        default: '',
    },
});
</script>
<template>
    <button v-if="href.length === 0"
        class="btn btn-primary inline-flex items-center justify-center px-10 py-2 border border-transparent font-bold uppercase tracking-widest transition ease-in-out duration-150"
    >
        <slot />
    </button>
    <Link v-else :href="href"
        class="btn btn-primary inline-flex items-center justify-center px-10 py-2 border border-transparent font-bold uppercase tracking-widest transition ease-in-out duration-150"
    >
        <slot />
    </Link>
</template>
