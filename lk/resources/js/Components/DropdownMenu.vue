<script setup>
import DownArrow from "@/assets/svg/ArrowDown.svg";
</script>

<template>
<div class="Dropdown">
    <button id="dropbtn" class="btnMenu"><slot name="name"></slot> <DownArrow/></button>
    <div class="dropdown-content">
        <slot/>
    </div>
</div>
</template>

<style scoped>

</style>
