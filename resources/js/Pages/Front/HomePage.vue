<template>
    <HeaderVue :auth="auth" :datas="data['menu']"/>

<!--    <Link href="/send">go to Page Send</Link>-->
<!--    <button @click="push()">Laravel :v{{version}}</button>-->
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HeaderVue from "./Layouts/HeaderVue";
import SliderVue from "./Layouts/SliderVue";
const props = defineProps({
    auth:String,
    data:Array
});
</script>
