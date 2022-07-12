<template>
        <div class="container box shadow overflow-hidden" style="width:100%;height: 100vh;max-height: 100vh;">
            <div class="bg-white row p-2 w-100 h-100">
                <div class="col-2 my-bg-b-100">
                <!-- MenuBar -->
                    <div class="w-100 p-1">
                        <p class="d-none d-md-block my-font-IYL my-f-10 my-color-b-300 text-end" dir="rtl">{{time}}</p>
                        <img src="/image/user/profile.png" class=" text-center" style="width:75%;"  alt="profile" >
                        <div class="d-none d-md-block my-line"></div>
                        <div class="box-menu-bar-profile">
                            <Link class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                 <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">پروفایل</span> <img src="/image/icon/user.png" style="width:30px;" alt="user">
                            </Link>
                            <Link class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">مرجوع محصول</span><img src="/image/icon/back.png" style="width:30px;" alt="back"> 
                            </Link>
                            <Link class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">سبد خرید</span><img src="/image/icon/basket.png" style="width:30px;" alt="basket"> 
                            </Link>
                            <Link class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">امتیاز </span><img src="/image/icon/coin.png" style="width:30px;" alt="coin"> 
                            </Link>
                            <Link class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">سفارش </span><img src="/image/icon/order.png" style="width:30px;" alt="order"> 
                            </Link>
                            <Link class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">ساپورت </span><img src="/image/icon/support.png" style="width:30px;" alt="support"> 
                            </Link>
                            <Link href="/logout" class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">خروج </span><img src="/image/icon/exit.png" style="width:30px;" alt="exit"> 
                            </Link>
                        </div>
                    </div>
                <!-- /MenuBar -->
                </div>
                <div class="col-10 p-2 my-bg-b-300 row" style="height: 100vh;">
                    <div class="col-md-3 col-12" style="height: 95%!important;" >
                        <div class="h-100 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">فاکتور های موفق</h6>
                            <div class="my-line"></div>
                            <!-- View Factor -->
                            <div v-for="(item , index) in factor" :key="index" @click="show_item_factor(item)"  class="d-flex justify-content-center flex-column my-pointer my-3 align-items-center">
                                <img src="/image/icon/order.png" style="width:70px;" alt="order">
                                <p class="my-font-IYL my-f-11 my-color-b-400">{{item.code_pay}}</p>
                            </div>
                            <!-- /View Factor -->
                        </div>
                    </div>
                    <div class="col-md-5 col-12" style="height: 95%!important;" >
                        <div class="h-50 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">کامنت های ارسالی</h6>
                            <div class="my-line"></div>
                            <div style="overflow-x: hidden;" v-for="(item , index) in comment['data']" :key="index" class="border-bottom d-flex justify-content-center flex-column my-3 align-items-center">
                                <Link :href="'/product/'+item.product.slug" class="my-font-IYL my-f-16 my-color-b-800 text-end" dir="rtl">{{item.product.name}}</Link>
                                <p class="my-font-IYL my-f-14 my-color-b-600 text-end" dir="rtl">{{item.subject}}</p>
                                <p class="my-font-IYL my-f-13 my-color-b-600 text-end" dir="rtl">{{item.text}}</p>
                                <p class="my-font-IYL my-f-11 my-color-b-400 text-end" dir="rtl">{{item.created_at}}</p>
                            </div>
                        </div>
                        <div class="h-50 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">ادرس</h6>
                            <div class="my-line"></div>
                            <div v-for="(item ,index) in address['data']" @click="show_item_address(item.id, item.city.name ,item.state.name ,item.location )" :key="index" class="border-bottom d-flex justify-content-center flex-column my-pointer my-3 align-items-center">
                                <img src="/image/icon/location.png" style="width:70px;" alt="location">
                                <p class="my-font-IYL my-f-14 mt-2 my-color-b-700">{{item.city.name}}</p>
                                <p class="my-font-IYL my-f-13 my-color-b-600">{{item.state.name}}</p>
                                <p class="my-font-IYL my-f-12 my-color-b-500">{{item.location}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12" >
                        <div class="h-100 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">جدیدترین اخبار</h6>
                            <div class="my-line"></div>
                            <div v-for="(item , index) in news" :key="index" class="border-bottom  my-pointer my-3">
                                <p class="my-font-IYL my-f-15 my-color-b-800 text-end" dir="rtl">{{item.title}}</p>
                                <p class="my-font-IYL my-f-14 my-color-b-600 text-end" dir="rtl">{{item.body}}</p>
                                <p class="my-font-IYL my-f-11 my-color-b-400 text-end" dir="rtl">{{item.created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <page-alert-vue :class_name="'page_view_factor'" :title="'فاکتور'" >
            <template #option>
                <p v-if="data_factor != null" class="my-font-IYM my-f-15 my-color-b-700 text-center my-3">{{data_factor.code_pay}}</p>
                <p v-if="data_factor != null" class="my-font-IYL my-f-13 my-color-b-600 text-center my-3">شماره موبایل : {{data_factor.mobile}}</p>
                <p v-if="data_factor != null" class="my-font-IYL my-f-13 my-color-b-600 text-center my-3"> جمع قیمت : {{data_factor.total_price}}</p>
                <button v-if="data_factor != null" @click="view_product_to_factor(data_factor.id)" class=" my-2 btn-sm btn btn-info">نمایش محصولات</button>
                <button v-if="product_factor != null" @click="print_factor" class="btn-sm btn btn-warning m-2">چاپ فاکتور</button>
                    <table v-if="product_factor != null" class="table table-bordered" id="print_this">
                        <thead>
                            <tr>
                                <th scope="col">نام</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">تعداد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item , index) in product_factor['data']" :key="index">
                                <td><Link :href="'/product/'+item.product.slug">{{item.product.name}}</Link></td>
                                <td>{{item.price}}</td>
                                <td>{{item.number}}</td>
                            </tr>
                        </tbody>
                    </table>
            </template>
        </page-alert-vue>
        <page-alert-vue :class_name="'page_view_address'" title="ادرس">
            <template #option>
                <p class="my-font-IYL my-f-15 my-color-b-800 text-center" dir="rtl">{{data_address_city}}</p>
                <p class="my-font-IYL my-f-14 my-color-b-600 text-center" dir="rtl">{{data_address_state}}</p>
                <p class="my-font-IYL my-f-11 my-color-b-400 text-center" dir="rtl">{{data_address_location}}</p>
                <i @click="delete_address" class="bi bi-trash3 text-center icon-delete-item-box-item-view-product my-f-15 my-pointer"></i>
            </template>
        </page-alert-vue>
        <div class="blur-page" ></div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import PageAlertVue from '../../Front/Layouts/PageAlertVue'
import $ from 'jquery'
import axios from 'axios'
export default {
    name: "ProfileVue",
    data:()=>({
        data_factor:null,
        product_factor:null,
        data_address_city:null,
        data_address_state:null,
        data_address_location:null,
        data_address_id:null,
    }),
    components:{
        Link,PageAlertVue
    },
    props:{
        time:String,
        auth:String,
        factor:Array,
        comment:Array,
        address:Array,
        news:Array
    },
    methods:{
        show_item_factor(data){
            this.data_factor = data
            $('.page_view_factor').fadeIn();
            $('.blur-page').fadeIn();
        },
        view_product_to_factor(id){
            axios.post('/view/product/factor' , {id:id}).then((res)=>{
                this.product_factor = res.data
                console.log(res.data)
            }).catch(()=>{
                console.error('Error : 587');
            })
        },
        show_item_address(id,city , state , location){
            this.data_address_id = id
            this.data_address_city = city
            this.data_address_state = state
            this.data_address_location = location
            $('.page_view_address').fadeIn();
            $('.blur-page').fadeIn();
        },
        delete_address(){
            axios.post('/delete/address/' , {id:this.data_address_id}).then((res)=>{
                $('.page_view_address').fadeOut();
                $('.blur-page').fadeOut();
            }).catch(()=>{
                console.error('Error:987')
            })
        },
        print_factor(){
            var printContents = $('body').html();
            var originalContents = $('#print_this').clone();
            $('body').empty().html(originalContents);
            window.print();
            $('body').empty().html(printContents);
        },
    }
}
</script>

<style scoped>

</style>
