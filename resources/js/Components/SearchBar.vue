<script setup>
import Search from "@/assets/svg/Search.svg";
import { onBeforeUnmount, onMounted, ref } from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps(["ulMenu"]);

const inputRef = ref(null);
const inputWidth = ref(190);
const windowWidth = ref(window.innerWidth);
const defMobSize = ref(75);
const increaseWidth = () => {
  // Увеличить ширину инпута при клике
  if (windowWidth.value >= 770) {
    inputWidth.value = 300;
    props.ulMenu.classList.add("input_clicked");
  }
};
const handleResize = () => {
  if (windowWidth.value <= 450) {
    inputWidth.value = defMobSize.value;
  } else {
    inputWidth.value = 190;
  }
  windowWidth.value = window.innerWidth;
};
const resetWidth = (event) => {
  // Проверить, был ли клик на инпуте
  if (!inputRef.value.contains(event.target)) {
    // Сбросить ширину при клике вне инпута
    inputWidth.value = 190;
    props.ulMenu.classList.remove("input_clicked");
  }
};

onMounted(() => {
  window.addEventListener("resize", handleResize);
  window.addEventListener("click", resetWidth);
});

onBeforeUnmount(() => {
  window.removeEventListener("resize", handleResize);
  window.removeEventListener("click", resetWidth);
});
</script>

<template>
  <div class="header__content">
    <div class="header__search">
      <form
        class="form-use-search"
        method="POST"
        action="https://volyavet.ru/search/query"
      >
        <input
          type="text"
          name="query"
          @click="increaseWidth"
          ref="inputRef"
          :style="{
            width:
              inputWidth === defMobSize ? inputWidth + '%' : inputWidth + 'px',
          }"
          class="header__input"
          placeholder="Поиск"
        />
        <input type="hidden" name="library" value="true" />
        <button class="header__btn_ddd">
          <Search class="header__searchIcon" />
        </button>
      </form>
    </div>
    <SecondaryButton :href="route('login')" class="header__btnS self-center"
      >Войти</SecondaryButton
    >
  </div>
</template>

<style scoped>
.form-use-search {
  display: flex;
  align-items: center;
}
[name="query"] {
  display: flex !important;
}
</style>
