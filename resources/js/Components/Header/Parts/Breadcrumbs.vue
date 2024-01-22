<script setup>
// Пропсы компонента
import {Link} from '@inertiajs/vue3';

defineProps({
    items: {
        type: Array,
        required: true,
    }
});
</script>

<template>
    <nav>
        <ul class="breadcrumb flex" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li v-for="(item, index) in items"
                :key="`item${index}`"
                :class="{ active: index === items.length - 1 }"
                itemprop="itemListElement"
                itemscope
                itemtype="https://schema.org/ListItem"
            >
                <div class="breadFirst flex items-center" v-if="index !== items.length - 1">
                    <Link :href="item.url"
                          class=" text-white"
                          itemtype="https://schema.org/Thing"
                          itemscope
                          itemprop="item"
                    ><span itemprop="name">{{ item.label }}</span></Link>
                    <meta itemprop="position" :content="(index + 1).toString()"/>
                    <hr class="w-[15px] border-t-[#64C1C6] mx-2.5">
                </div>

                <div v-else>
                    <span itemprop="name">{{ item.label }}</span>
                    <meta itemprop="position" :content="(index + 1).toString()" />
                </div>
            </li>
        </ul>
    </nav>
</template>


<style scoped>
/* Стили для навигационной хлебной крошки */
.breadcrumb {
    padding: 0;
    margin: 0;
    list-style: none;
}

.breadcrumb li {
    display: inline;
    margin-right: 5px;
}

.breadcrumb li a {
    text-decoration: none;
}

.breadcrumb li.active {
    color: #C6D4D3;
    pointer-events: none; /* Делает последний элемент неактивным */
}
</style>
