<template>
    <RegisterPageVue :csrf="csrf"/>
</template>

<script setup>
import RegisterPageVue from "./Layouts/RegisterPageVue";

const props = defineProps({
    csrf:String
});
</script>

<style scoped>

</style>
