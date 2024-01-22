<script setup>
import {Link, usePage} from "@inertiajs/vue3";
let styles = "inline-flex w-1/2 items-center justify-center px-10 py-2 border border-transparent text-[15px] tracking-widest transition ease-in-out duration-150";

const page = usePage();


</script>

<template>
    <div class="RegOrAuth flex flex-row w-full pb-[32px]">
        <Link :href="route('register')" class="RegL" :class="styles + (page.url === '/login' ? ' brdReGA' : ' bgBlued')">
            Регистрация
        </Link>
        <Link :href="route('login')" class="AuthL"  :class="styles + (page.url === '/register' ? ' brdReGA' : ' bgBlued')">
            Вход
        </Link>
    </div>
</template>

<style scoped>

.RegL {
    border-radius: 8px 0 0 8px;
}
.brdReGA {
    color:black;
    border: 1px solid #D4D4D4;
}
.bgBlued {
    background: rgba(61, 77, 137, 0.60);
    color:white;
}
.AuthL {
    border-radius: 0 8px 8px 0;
}
</style>
