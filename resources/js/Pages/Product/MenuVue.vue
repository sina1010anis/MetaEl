<template>
    <HeaderVue :auth="auth" :datas="data['menu']" :history_search="data['history_search']"/>
    <PageMenuVueVue  />
    <FooterVue />
</template>

<script setup>
    import HeaderVue from "../Front/Layouts/HeaderVue";
    import FooterVue from "../Front/Layouts/FooterVue";
    import ProductVue from "./Layouts/ProductVue";
    import PageMenuVueVue from "./Layouts/PageMenuVue";
    const url = 'localhost:8000';
    const props =defineProps({
        auth:String,
        data:Array
    });
</script>

<style scoped>

</style>
