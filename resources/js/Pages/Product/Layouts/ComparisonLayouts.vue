<template>
        <header class="container box">
            <div class="row p-2">
                <div class="col-5 bg-white">
                    <h5 class="text-center my-font-IYM my-color-b-600 my-4">{{product_1.name}}</h5>
                    <div class="view-image d-flex justify-content-center align-content-center my-3">
                        <img :src="'/image/product/'+product_1.image" style="height: 200px;" :alt="product_1.name">
                    </div>
                    <div class="view-data">
                        <p class="my-font-IYL my-color-b-600 my-f-15 my-4 text-center" v-for="(item , index) in detail_product_1['data']" :key="index">
                            {{item['filter']['name']}}
                        </p>
                        <p class="my-font-IYL my-color-b-600 my-f-15 my-4 text-center" >
                            {{product_1.price}}
                        </p>
                    </div>
                </div>
                
                <div class="col-2">
                    <h5 class=" my-font-IYM my-color-b-600 text-center my-4">
                        <i class="bi bi-arrow-left-right my-f-18 "></i>
                    </h5>
                    <div style="width: 100%;height: 200px;"></div>
                    <div class="view-data">
                        <p class="my-font-IYM my-color-b-600 my-f-15 my-4 text-center" v-for="(item , index) in detail_product_1['data']" :key="index">
                            {{item['title_filter']['subject']}}
                        </p>
                        <p class="my-font-IYM my-color-b-600 my-f-15 my-4 text-center">
                            قیمت
                        </p>
                    </div>
                </div>

                <div class="col-5 bg-white">
                    <h5 class="text-center my-font-IYM my-color-b-600 my-4">{{product_2.name}}</h5>
                    <div class="view-image d-flex justify-content-center align-content-center my-3">
                        <img :src="'/image/product/'+product_2.image" style="height: 200px;" :alt="product_2.name">
                    </div>
                    <div class="view-data">
                        <p class="my-font-IYL my-color-b-600 my-f-15 my-4 text-center" v-for="(item , index) in detail_product_2['data']" :key="index">
                            {{item['filter']['name']}}
                        </p>
                        <p class="my-font-IYL my-color-b-600 my-f-15 my-4 text-center" >
                            {{product_2.price}}
                        </p>
                    </div>
                </div>
            </div>
        </header>
</template>

<script>
    export default {
        name : 'ComparisonLayouts',
        props:{
            product_1:Array,
            product_2:Array,
            detail_product_1:Array,
            detail_product_2:Array,
        },
        methods:{
            send(){
                console.log(this.detail_product_1['data']);
            }
        }
    }
</script>
