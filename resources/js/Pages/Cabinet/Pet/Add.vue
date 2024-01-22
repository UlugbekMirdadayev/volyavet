<script setup>
import { getDate, getDogYears } from "@/utils/methods.js";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestInfo from "@/Components/GuestInfo.vue";
import TextInput from "@/Components/TextInput.vue";
import AreaText from "@/Components/AreaText.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import InputError from "@/Components/InputError.vue";
import SelectInput from "@/Components/SelectInput.vue";
import Callback from "@/Components/Popup/Callback.vue";

const form = useForm({
  typeAnimal: undefined, // вид животного подтягивать с CRM || SELECT // i
  petBreed: undefined, // i
  petNickname: "", // i
  sexAnimal: "", // Пол питомца || select // i
  dateBirthAnimal: undefined, // Пол питомца || select // i
  color: "",
  cheapNumber: "",
  weight: "",
  note: "",
});

const optionsAnimalType = ref();
const optionsAnimalBreed = ref();

const calendarColor = ref("blue");

const normalDate = onMounted((date) => {
  return new Date(date).toLocaleDateString();
});

const getBreed = () => {
  axios.get("/api/petType").then((resp) => {
    const data = resp.data;
    if (data.success) {
      console.log(data);
      optionsAnimalType.value = data.data?.petType;
    } else {
      console.warn("PET TYPE NOT WORKING!!!");
    }
  });
};

const opened = ref(false);

onMounted(() => {
  getBreed();
});

const changeBreed = ($id) => {
  const breed = optionsAnimalType.value[$id - 1];
  optionsAnimalBreed.value = breed.breeds;
  form.reset("petBreed");
};

const submit = () => {
  form.post(route("pets.store"), {
    onSuccess: (e) => {
      if (form.wasSuccessful) opened.value = true;
    },
  });
};
</script>

<template>
  <AuthenticatedLayout styleClass="max-w-2xl" :page="false">
    <template #info>
      <GuestInfo> Добавление питомца </GuestInfo>
    </template>
    <form @submit.prevent="submit" class="flex flex-col gap-5">
      <div class="flex flex-col">
        <TextInput
          v-model="form.petNickname"
          placeholder="Кличка"
          class="w-full"
        />

        <InputError class="mt-2" :message="form.errors.petNickname" />
      </div>
      <div class="flex flex-col sm:flex-row gap-5 sm:gap-20">
        <div class="info__left flex flex-col sm:w-1/2 gap-5">
          <div>
            <SelectInput
              id="typeAnimal"
              placeholder="Вид питомца"
              required
              :options="optionsAnimalType"
              v-model="form.typeAnimal"
              :class="form.errors.typeAnimal ? 'border-red-500' : ''"
              :pet-breed="true"
              class="w-full"
              @change="changeBreed($event.target.value)"
            />
            <InputError class="mt-2" :message="form.errors.typeAnimal" />
          </div>
          <div>
            <SelectInput
              id="petBreed"
              class="block w-full"
              v-model="form.petBreed"
              :class="form.errors.petBreed ? 'border-red-500' : ''"
              required
              :options="optionsAnimalBreed"
              :pet-breed="true"
              autocomplete="name"
              placeholder="Порода"
            />
            <InputError class="mt-2" :message="form.errors.petBreed" />
          </div>
          <div>
            <SelectInput
              id="petColor"
              class="block w-full"
              v-model="form.color"
              :class="form.errors.color ? 'border-red-500' : ''"
              required
              :options="$page.props.colors"
              autocomplete="name"
              placeholder="Окрас"
              :pet-breed="true"
            />
            <InputError class="mt-2" :message="form.errors.color" />
          </div>
          <div>
            <div class="relative">
              <VDatePicker
                v-model="form.dateBirthAnimal"
                :color="calendarColor"
                is-dark="system"
              >
                <template #default="{ inputValue, inputEvents }">
                  <TextInput
                    id="dateBirthAnimal"
                    :value="inputValue"
                    v-on="inputEvents"
                    class="block w-full"
                    :model-value="inputValue"
                    :class="form.errors.dateBirthAnimal ? 'border-red-500' : ''"
                    placeholder="Дата рождения питомца"
                  />
                </template>
              </VDatePicker>
            </div>
            <InputError class="mt-2" :message="form.errors.dateBirthAnimal" />
          </div>
        </div>
        <div class="info__right flex flex-col sm:w-1/2 gap-5">
          <div>
            <SelectInput
              id="petBreed"
              class="block w-full"
              v-model="form.sexAnimal"
              :class="form.errors.sexAnimal ? 'border-red-500' : ''"
              required
              :options="$page.props.sex"
              autocomplete="name"
              placeholder="Пол питомца"
            />
            <InputError class="mt-2" :message="form.errors.sexAnimal" />
          </div>
          <div>
            <TextInput
              v-model="form.weight"
              type="text"
              placeholder="Вес (кг)"
              :class="form.errors.weight ? 'border-red-500' : ''"
              autocomplete="name"
              class="w-full"
            />
            <InputError class="mt-2" :message="form.errors.weight" />
          </div>

          <div>
            <TextInput
              v-model="form.cheapNumber"
              type="number"
              placeholder="№ чипа"
              :class="form.errors.cheapNumber ? 'border-red-500' : ''"
              autocomplete="name"
              class="w-full"
            />
            <InputError class="mt-2" :message="form.errors.cheapNumber" />
          </div>
        </div>
      </div>
      <div class="flex flex-col">
        <span class="mb-3.5 text-lg">Примечание</span>
        <AreaText
          v-model="form.note"
          :class="form.errors.note ? 'border-red-500' : ''"
          :scndy="true"
          custom-holder="Введите текст"
        ></AreaText>
        <InputError class="mt-2" :message="form.errors.note" />
      </div>
      <PrimaryButton class="md:w-1/2 sm:mx-auto"
        >Добавить питомца</PrimaryButton
      >
    </form>
  </AuthenticatedLayout>
</template>

<style scoped></style>
