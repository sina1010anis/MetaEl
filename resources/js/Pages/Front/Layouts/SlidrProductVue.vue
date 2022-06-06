<template>
    <div class="container box my-5">
        <div class="row" v-if="model == 'mobile'">
            <div class="col-12" style="height: 150px;position: relative;overflow: hidden">
                <div class="bg-white h-100 box-img-slide d-flex" style="position:relative;">
                    <img loading="lazy" v-for="(i , index) in 15" :src="'/image/product/product_'+index+ '.jpg'" style="width: 150px;" class="h-100 mx-5" alt="">
                    <img loading="lazy" v-for="(i , index) in 15" :src="'/image/product/product_'+index+ '.jpg'" style="width: 150px;" class="h-100 mx-5" alt="">
                </div>
            </div>
        </div>
        <div class="row" v-if="model == 'laptop'">
            <div class="col-12" style="height: 150px;position: relative;overflow: hidden">
                <div class="bg-white h-100 box-img-slide-l d-flex" style="position:relative;">
                    <img loading="lazy" v-for="(i , index) in 15" :src="'/image/product/product_l_'+index+ '.jpg'" style="width: 150px;" class="h-100 mx-5" alt="">
                    <img loading="lazy" v-for="(i , index) in 15" :src="'/image/product/product_l_'+index+ '.jpg'" style="width: 150px;" class="h-100 mx-5" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SlidrProductVue",
    props:{
        model:String
    }
}
</script>

<style scoped>

</style>
