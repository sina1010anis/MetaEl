<template>
    <HeaderVue :auth="auth" :datas="data['menu']"/>
    <SliderVue :images="imageSlider"/>
    <ItemsVue :data="data['items']"/>
    <BannerVue :data="data['banner']" :location="'start'"/>
    <ProductVue />
<!--    <Link href="/send">go to Page Send</Link>-->
<!--    <button @click="push()">Laravel :v{{version}}</button>-->
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HeaderVue from "./Layouts/HeaderVue";
import SliderVue from "./Layouts/SliderVue";
import ItemsVue from "./Layouts/ItemsVue";
import BannerVue from "./Layouts/BannerVue";
import ProductVue from "./Layouts/ProductVue";
const props = defineProps({
    auth:String,
    data:Array,
    imageSlider:Array
});
</script>
