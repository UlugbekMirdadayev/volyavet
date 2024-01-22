<script setup>

</script>

<template>

    <div class="GuestInformation sm:max-w-lg text-center flex flex-col gap-9">
        <div class="info__title">
            <h1 class="sm:text-lg lg:text-2xl">
                <slot/>
            </h1>
        </div>
        <div :class="['info__description', {'hidden': !$slots.description}]">
            <p class="text-[14px] lg:text-[15px]">
                <slot name="description"/>
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>
