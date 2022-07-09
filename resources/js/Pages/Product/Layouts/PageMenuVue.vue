<template>
        <div class="container box my-3">
            <div class=" row">
                <div class="col-12 col-md-4">
                    <div v-for="(item , index) in filter['data']" :key="index" class="box-a-filter p-2 mt-3">
                        <p class="my-font-IYL my-f-14 my-color-b-600">{{item.subject}}</p>
                        <div class="box-a-filter-item p-2">
                            <div v-for="(item_2 , index_2) in item.item_filter" :key="index_2" class="m-2 form-check form-switch">
                                <input @change="set_item_filter(item_2.name,item_2.id)"  :value="item_2.id" :name="item_2.title_filter_id" :id="item_2.id + '-' + item_2.title_filter_id" class="form-check-input" type="checkbox" role="switch">
                                <label class="my-font-IYL my-f-13 my-color-b-500" :for="item_2.id + '-' + item_2.title_filter_id">{{item_2.name}}</label>
                            </div> 
                        </div>
                    </div>
                    <div v-if="array_filter_name.length > 0" class="box-a-filter p-2 mt-3">
                        <p class="my-font-IYL my-f-12 my-color-b-600">فیلتر های اعمل شده</p>
                        <div class="box-a-filter-item p-2">
                            <div v-for="(item , index) in array_filter_name" :key="index" class="m-2 form-check form-switch">
                                <p class="my-font-IYL my-f-12 my-color-b-400">{{item}}</p>
                            </div> 
                        </div>
                    </div>
                    <button v-if="array_filter_name.length > 0" @click="send_filter" class="btn btn-danger d-block mt-2 my-font-IYM my-f-13 my-color-b w-100">اعمال فیلتر</button>
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
        </div>
    <div class="blur-page "></div>
    <div class="load-page my-obj-center px-5 py-2 bg-white rounded-3">
        <div class="loader">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import lodash from 'lodash'
import axios from 'axios'
import $ from 'jquery'
export default {
    name: 'PageMenuVue',
    data:()=>({
        data_product:null,
        array_filter_id:[],
        array_filter_name:[]
        
    }),
    props:{
        menu_on:Array,
        data:Array,
        filter:Array
    },
    components:{
        Link,lodash
    },
    methods:{
        send_filter(){
            $('.blur-page').fadeIn();
            $('.load-page').fadeIn();
            setTimeout(() => {
                axios.post('/filter/product/' , {id:this.array_filter_id}).catch((err)=>{
                    console.error(err)
                    }).then((res)=>{
                        if(res.data != 'null'){
                            this.data_product = res.data
                            $('.blur-page').fadeOut();
                            $('.load-page').fadeOut();
                        }else{
                            alert('محصولی یافت نشد')
                        }
                    })
            }, 1500);

        },
        sort_product(model){
            axios.post('/sort/product/' , {model:model , id: this.menu_on.id })
            .then((res)=>{
                this.data_product = res.data
                console.log(res.data);
            })
            .catch(()=>{console.error('Error : 597');})
        },
        set_item_filter(name,id){
            if(this.find_item(this.array_filter_id , id)){
                this.array_filter_id.push(id)
                this.array_filter_name.push(name)
            }else{
                this.array_filter_id.pop(id)
                this.array_filter_name.pop(name)
            }
            if(this.array_filter_id == []){
                this.data_product = null
            }
        },
        find_item(data , item){
            var status = true;
            for(let i = 0 ; i <= data.length ; i++){
                if(data[i] == item){
                    status = false;
                    break;
                }
            }
            return status;
        },
    }
}
</script>

<style scoped>

</style>
