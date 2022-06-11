<template>
    <ProductVue :title="'مرتبط ها'" :products="data"/>
</template>
<script>
import ProductVue from '../../Front/Layouts/ProductVue'
export default {
    name:'RelatedProductVue',
    components:{
        ProductVue
    },
    props:{
        data:Array
    }
}
</script>