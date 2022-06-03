<template>
    <div class="container box mt-3">
        <div class="row row-cols-1 row-cols-md-3 box-items-in-home-page">
            <div class="col" v-for="(item , index) in data" :key="index">
                <div class="">
                    <div class="card my-3 p-2" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-4 my-pos-relative">
                                <img :src="'/image/front/'+item.image" class="img-fluid rounded-start my-obj-center mt-1 mt-md-0" style="width: 90px;background-color: #ffffff" :alt="item.name">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title my-font-IYM my-color-b-700 my-f-15">{{item.name}}</h5>
                                    <p class="card-text my-font-IYL my-color-b-500 my-f-13">{{item.description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ItemsVue",
    props:{
        data:Array
    }
}
</script>

<style scoped>

</style>
