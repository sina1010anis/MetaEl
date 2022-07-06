<template>
        <header class="container box my-3">
            <div class=" row">
                <div class="col-12 col-md-4">
                    <div v-for="(item , index) in filter['data']" :key="index" class="box-a-filter p-2">
                        <p class="my-font-IYL my-f-14 my-color-b-600">{{item.subject}}</p>
                        <div class="box-a-filter-item p-2 d-flex flex-wrap">
                            <div v-for="(item_2 , index_2) in item.item_filter" :key="index_2" class="m-2">
                                <input type="radio" :value="item_2.id" class="btn-check btn-danger " :name="item_2.title_filter_id" :id="item_2.id + '-' + item_2.title_filter_id" autocomplete="off">
                                <label class="btn btn-danger" :for="item_2.id + '-' + item_2.title_filter_id">{{item_2.name}}</label>
                            </div> 
                        </div>
                    </div>
                    <button class="btn btn-danger d-block mt-2 my-font-IYM my-f-13 my-color-b w-100">اعمال فیلتر</button>
                </div>

                <div class="col-12 col-md-8">
                    <div class=" p-2">
                        <h5 class="my-font-IYM my-color-b-600"> محصولات {{menu_on.name}}</h5> 
                        <div class="my-line my-3"></div>
                        <div class="d-flex box-item-f">
                            <div @click="sort_product('new')" class="mx-2 px-2 py-1 rounded-3 item-f my-font-IYL my-f-12 my-pointer">جدیدترین</div>
                            <div @click="sort_product('expensive')" class="mx-2 px-2 py-1 rounded-3 item-f my-font-IYL my-f-12 my-pointer">گرانترین</div>
                            <div @click="sort_product('inexpensive')" class="mx-2 px-2 py-1 rounded-3 item-f my-font-IYL my-f-12 my-pointer">ارزانترین</div>
                        </div> 
                        <div class="box-product-menu my-3 d-flex flex-wrap">
                            <Link v-for="(item , index) in (data_product == null) ? data : data_product" :key="index" style="width: 200px;height: 300px;" class="item-product-menu" :href="'/product/'+item.slug">
                                <img :src="'/image/product/' + item.image" :alt="item.name" class="">
                                <p class="my-f-15 my-font-IYL my-color-b-600 text-center">{{item.name}}</p>
                                <p class="my-f-14 my-font-IYM my-color-b-800 text-center">{{item.price}} تومان</p>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import axios from 'axios'
export default {
    name: 'PageMenuVue',
    data:()=>({
        data_product:null
    }),
    props:{
        menu_on:Array,
        data:Array,
        filter:Array
    },
    components:{
        Link,
    },
    methods:{
        sort_product(model){
            axios.post('/sort/product/' , {model:model , id: this.menu_on.id })
            .then((res)=>{
                this.data_product = res.data
                console.log(res.data);
            })
            .catch(()=>{console.error('Error : 597');})
        }
    }
}
</script>

<style scoped>

</style>
