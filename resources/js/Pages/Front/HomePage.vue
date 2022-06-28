<template>
    <HeaderVue :auth="auth" :datas="data['menu']" :data_cart="data['data_cart']" :total_price="data['total_price']" :total_count="data['total_count']"/>
    <SliderVue :images="imageSlider"/>
    <ItemsVue :data="data['items']"/>
    <BannerVue :data="data['bannerS']" :location="'start'"/>
    <ProductVue :title="'موبایل ها'" :products="data['products_mobile']" />
    <BannerVue :data="data['bannerC']" :location="'center'"/>
    <ProductVue :title="'لپ تاپ ها'" :products="data['products_laptop']" />
    <SlidrProductVue :model="'mobile'"/>
    <ProductVue :title="'لوازم اداری'" :products="data['products_office']" />
    <BannerVue :data="data['bannerE']" :location="'end'"/>
    <SlidrProductVue :model="'laptop'"/>
    <FooterVue />
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HeaderVue from "./Layouts/HeaderVue";
import SliderVue from "./Layouts/SliderVue";
import ItemsVue from "./Layouts/ItemsVue";
import BannerVue from "./Layouts/BannerVue";
import ProductVue from "./Layouts/ProductVue";
import SlidrProductVue from "./Layouts/SlidrProductVue";
import FooterVue from "./Layouts/FooterVue";
const props = defineProps({
    auth:String,
    data:Array,
    imageSlider:Array
});
</script>
