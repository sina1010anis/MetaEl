<template>
    <div  :class="'blur-page '+ (show = 1)? 'd-block' : 'd-none'"></div>
</template>

<script>
export default {
    name: "BlurVue",
    props:{
        show:Number
    }
}
</script>

<style scoped>

</style>
