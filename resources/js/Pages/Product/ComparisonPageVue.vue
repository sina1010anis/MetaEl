<template>
    <HeaderVue :auth="auth" :history_search="data['history_search']" :datas="data['menu']" :data_cart="data['data_cart']" :total_price="data['total_price']" :total_count="data['total_count']"/>
    <ComparisonLayouts :product_1="data['product_1']" :product_2="data['product_2']"/>
    <FooterVue />
</template>

<script setup>
    import ComparisonLayouts from './Layouts/ComparisonLayouts';
    import HeaderVue from "../Front/Layouts/HeaderVue";
    import FooterVue from "../Front/Layouts/FooterVue";
    const props =defineProps({
        data:Array
    });
</script>