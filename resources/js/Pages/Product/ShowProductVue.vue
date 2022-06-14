<template>
    <HeaderVue :auth="auth" :datas="data['menu']"/>
    <ProductVue
    :related="data['related_product']"
    :prices="data['price_product']"
    :datail="data['datail']"
    :data="data['product']"
    :image="data['image_product']"
    :menu_a="data['menu_a']"
    :menu_s="data['menu_s']"
    :auth="auth"
    :comment="data['comment_product']"
    :count_comment="data['count_comment']"
    :csrf="data['csrf']"
    :url="url"/>
    <FooterVue />
</template>

<script setup>
    import HeaderVue from "../Front/Layouts/HeaderVue";
    import FooterVue from "../Front/Layouts/FooterVue";
    import ProductVue from "./Layouts/ProductVue";
    const url = 'localhost:8000';
    const props =defineProps({
        auth:String,
        data:Array
    });
</script>

<style scoped>

</style>
