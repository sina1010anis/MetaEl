<template>
    <HeaderVue :auth="auth" :history_search="data['history_search']" :datas="data['menu']" :data_cart="data['data_cart']" :total_price="data['total_price']" :total_count="data['total_count']"/>
    <PageMenuVue  :menu_on="data['menu_on']" :data="data['product']" :filter="data['filter']"/>
    <FooterVue />
</template>

<script setup>
    import HeaderVue from "../Front/Layouts/HeaderVue";
    import FooterVue from "../Front/Layouts/FooterVue";
    import ProductVue from "./Layouts/ProductVue";
    import PageMenuVue from "./Layouts/PageMenuVue";
    const url = 'localhost:8000';
    const props =defineProps({
        auth:String,
        data:Array
    });
</script>

<style scoped>

</style>
