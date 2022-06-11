<template>
    <HeaderVue :auth="auth" :datas="data['menu']"/>
    <ProductVue :related="data['related_product']" :prices="data['price_product']" :datail="data['datail']" :data="data['product']" :image="data['image_product']" :menu_a="data['menu_a']" :menu_s="data['menu_s']"/>
    <FooterVue />
</template>

<script setup>
    import HeaderVue from "../Front/Layouts/HeaderVue";
    import FooterVue from "../Front/Layouts/FooterVue";
    import ProductVue from "./Layouts/ProductVue";
    const props =defineProps({
        auth:String,
        data:Array
    });
</script>

<style scoped>

</style>
