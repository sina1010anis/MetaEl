<template>
    <HeaderVue :auth="auth" :datas="data['menu']"/>
    <SliderVue :images="imageSlider"/>
    <ItemsVue :data="data['items']"/>
    <BannerVue :data="data['bannerS']" :location="'start'"/>
    <ProductVue />
    <BannerVue :data="data['bannerC']" :location="'center'"/>
    <ProductVue />
    <SlidrProductVue :model="'mobile'"/>
    <ProductVue />
    <BannerVue :data="data['bannerE']" :location="'end'"/>
    <SlidrProductVue :model="'laptop'"/>
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HeaderVue from "./Layouts/HeaderVue";
import SliderVue from "./Layouts/SliderVue";
import ItemsVue from "./Layouts/ItemsVue";
import BannerVue from "./Layouts/BannerVue";
import ProductVue from "./Layouts/ProductVue";
import SlidrProductVue from "./Layouts/SlidrProductVue";
const props = defineProps({
    auth:String,
    data:Array,
    imageSlider:Array
});
</script>
