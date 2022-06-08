<template>
    <RegisterPageVue v-if="status == 'register'" :csrf="csrf"/>
    <LoginPageVue v-if="status == 'login'" :csrf="csrf"/>
</template>

<script setup>
import RegisterPageVue from "./Layouts/RegisterPageVue";
import LoginPageVue from "./Layouts/LoginPageVue";

const props = defineProps({
    csrf:String,
    status:String
});
</script>

<style scoped>

</style>
