<template>
    <div class="container box my-3">
        <div class="row">
            <div class="col-md-3 col-12 order-1 order-md-0 h-100">
                <div class="w-100 p-2 rounded-3 shadow" style="height: 430px;background-color: #f8f8f8">
                    <p class="my-font-IYL my-color-b-400 my-f-11 my-2">برگه ارسال</p>
                    <div class="my-line"></div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-mailbox" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">{{datail.send_time}}</span>
                        <span class="my-font-IYL my-color-b-400 my-f-10">{{'زمان ارسال'}}</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-cash-stack" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">{{datail.send_price}}</span>
                        <span class="my-font-IYL my-color-b-400 my-f-10">{{'هزینه ارسال'}}</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-cash-stack" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">{{data.price}}</span>
                        <span class="my-font-IYL my-color-b-400 my-f-10">{{'قیمت واحد'}}</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-archive" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">{{datail.weight}}</span>
                        <span class="my-font-IYL my-color-b-400 my-f-10">{{'وزن محصول'}}</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-chat-dots" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">{{data.price}}</span>
                        <span class="my-font-IYL my-color-b-400 my-f-10">{{'نظرات'}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 order-1 order-md-0">
                <div class="w-100 p-2">
                    <h4 class="my-font-IYM my-color-b-600">{{data.name}}</h4>
                    <p class="my-font-IYL my-color-b-400 my-f-12 my-4" align="right">{{menu_a.name}} / <Link style="text-decoration: none" href="/test">{{menu_s.name}}</Link></p>
                    <div class="my-line"></div>
                    <p class="my-font-IYL my-color-b-600 my-f-13 my-2 lh-lg">
                        {{data.description}}
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 my-pos-rel order-0 order-md-1" style="height: 430px">
                <div class="w-100 p-2  h-100">
                    <div class="my-obj-center w-100 text-center mt-4" >
                        <img :src="(srcImage == '') ? '/image/product/'+data.image : srcImage" style="height: 300px" class=" my-2" :alt="data.name">
                        <div class=" w-100 d-flex flex-nowrap overflow-scroll align-items-center justify-content-center" style="height: 60px">
                            <img  v-for="(img , index) in image" :key="index" @click="setImage('/image/product/'+img.image)"  :src="'/image/product/'+img.image" :alt="img.name" class="h-100 mx-2 rounded-3 my-pointer shadow-sm">
                            <img  @click="setImage('/image/product/'+data.image)" :src="'/image/product/'+data.image" :alt="data.name" class="h-100 mx-2 rounded-3 my-pointer shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-4 col-12 d-flex justify-content-center align-content-center my-pos-rel order-md-0 order-2">
                <div v-if="size_price != null" class="btn-buy-show-product py-2 px-4 rounded-3 my-font-IYL my-f-12 my-color-b my-boj-center my-pointer">خرید محصول</div>
                <div v-if="size_price == null" class="col-md-4 col-12 my-font-IYL my-f-11" style="color:#ff7272">لطفا یک نوع از محصول را انتخاب کنید</div>
            </div>
            <div class="col-md-4 col-12 d-flex justify-content-center align-content-center order-1">
                <select @change="setSelect" v-model="size_price" class="form-select" aria-label="Default select example">
                    <option class="my-font-IYL my-f-13 my-color-b-600" v-for="(price , index) in prices" :value="price.id" :key="index">{{price.name}}</option>
                </select>
            </div>
            <div class="col-md-4 col-12 d-flex justify-content-center align-content-center order-md-2 order-0">{{(!status_size_price) ? data.price : text_size_price}}</div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
import axios from 'axios'
export default {
    name: "ProductVue",
    data:()=>({
        srcImage:'',
        size_price:null,
        status_size_price:false,
        text_size_price:'',
    }),
    components:{
        Link,
    },
    props:{
        data:Array,
        image:Array,
        menu_s:Array,
        menu_a:Array,
        datail:Array,
        prices:Array
    },
    methods:{
        setImage(src){
            this.srcImage = src
        },
        setSelect(){
            axios.post('/set/price' , {id:this.size_price}).then((res)=>{
                this.status_size_price = true
                this.text_size_price = res.data.price
            }).catch(()=>{
                
            })
        },
    }
}
</script>

<style scoped>

</style>
