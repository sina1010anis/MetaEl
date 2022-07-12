<template>
    <HeaderVue :auth="auth" :history_search="data['history_search']" :datas="data['menu']" :data_cart="data['data_cart']" :total_price="data['total_price']" :total_count="data['total_count']"/>
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
    :url="url"
    :save_product="data['save_product']"/>
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
