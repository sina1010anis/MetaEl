<template>
    <p>{{product_1}}</p>
    <p>{{product_2}}</p>
</template>

<script>
    export default {
        name : 'ComparisonLayouts',
        props:{
            product_1:Array,
            product_2:Array,
        }
    }
</script>
