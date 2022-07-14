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
                            <Link :href="'/profile/user'" class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
                                 <span class="d-none d-md-block my-font-IYL my-f-12 my-color-b-600">پروفایل</span> <img src="/image/icon/user.png" style="width:30px;" alt="user">
                            </Link>
                            <Link :href="'/product/return/'" class="my-3 item-menu-bar d-flex justify-content-between align-items-center my-pointer">
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

                
                <div class="col-10 p-2 my-bg-b-300 row" style="height: 100vh;" v-if="status == 'index'">
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

                <div class="col-10 p-3 my-bg-b-300 row" style="height: 100vh;" v-if="status == 'profile'">
                    <h5 class="my-font-IYM my-color-b-500">میز کاربری {{data['data_user'].name}}</h5>
                    
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-6">
                            <label for="firstName" class="form-label my-font-IYL my-f-12 my-color-b-500">نام</label>
                            <input type="text" class="form-control my-font-IYL my-f-12 my-color-b-500" id="firstName" placeholder="" :value="data['data_user'].name" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                            </div>

                            <div class="col-sm-6">
                            <label for="lastName" class="form-label my-font-IYL my-f-12 my-color-b-500">موبایل</label>
                            <input type="text" class="form-control my-font-IYL my-f-12 my-color-b-500" id="lastName" placeholder="" :value="data['data_user'].mobile" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                            </div>

                            <div class="col-12">
                            <label for="email" class="form-label my-font-IYL my-f-12 my-color-b-500">ایمیل <span class="text-muted">(اختیاری)</span></label>
                            <input :value="data['data_user'].email" type="email" class="form-control my-font-IYL my-f-12 my-color-b-500" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                            </div>
                        </div>

                    

                        <button class="w-100 btn btn-primary btn-lg my-font-IYL my-f-12 my-color-b-500" type="submit">ویرایش</button>
                    </form>

                </div>

                <div class="col-10 p-3 my-bg-b-300 row" style="height: 100vh;" v-if="status == 'product_return'">

                    <div class="col-12 col-md-6 border-end">
                        <div class="h-50">
                            <span class="my-font-IYM my-f-15 my-color-b-500">مرجوع محصول</span>
                            <div class="my-line my-3"></div>
                            <div class="w-100 my-bg-b-400" style="max-height:200px ;overflow-y: scroll;">
                                <div class="w-100 p-2 item-product-return d-flex justify-content-between align-items-center align-content-center">
                                    <img style="width: 80px;" src="/image/product/product_1.jpg" alt="">
                                    <span class="my-font-IYM my-f-12 my-color-b-500">نام محصول</span>
                                    <span class="my-font-IYM my-f-12 my-color-b-500">تعداد</span>
                                    <button class="btn btn-warning btn-sm my-font-IYL my-f-12 my-color-b" style="height: 40px">مرجوع</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <span class="my-font-IYM my-f-15 my-color-b-500">سفارش مجدد</span>
                        <div class="my-line my-3"></div>
                        <div v-if="data_product_return != null" class="w-100 my-bg-b-400" style="max-height:200px ;overflow-y: scroll;">
                            <div v-for="(item , index) in data_product_return['data']" :key="index" class="w-100 p-2 item-product-return d-flex justify-content-between align-items-center align-content-center">
                                <img style="width: 80px;" :src="'/image/product/'+ item.product.image " alt="">
                                <span class="my-font-IYM my-f-12 my-color-b-500">{{item.product.name}}</span>
                                <span class="my-font-IYM my-f-12 my-color-b-500">{{item.number}}</span>
                            </div>
                        </div>
                        <div v-if="data_product_return != null" class="d-flex justify-content-center align-content-center">
                            <button type="button" @click="send_edit_status" class="btn btn-warning my-color-b my-font-IYL my-f-12 px-4 py-1">مرجوع</button>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label my-font-IYM my-f-15 my-colo-b-700">کد سفارش</label>
                            <input v-model="code_product_return" type="email" class="form-control my-color-b-700 my-font-IYL my-f-12 p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text my-font-IYL my-f-11 my-colo-b-400">پس از دریافت محصول از تیم ما کد سفارش مجدد برای شما ارسال می شود و ارسال این کد محصولی که درخواست کرده بوده اید برای شما بدون هزینه ارسال ارسال می شود</div>
                            <p class="my-f-11 my-font-IYL my-2" style="color:red;" v-if="error_code_product_return != null">{{error_code_product_return}}</p>   
                            <p class="my-f-11 my-font-IYL my-2" style="color:green;" v-if="alert_code_product_return != null">{{alert_code_product_return}}</p>   
                        </div>
                        <div class="d-flex justify-content-center align-content-center">
                            <button type="button" @click="send_code_product_return" class="btn btn-warning my-color-b my-font-IYL my-f-12">برسی</button>
                        </div>
                        <div class="my-line my-3"></div>
                        <span class="my-font-IYM my-f-15 my-color-b-500">لیست مرجوعی ها</span>
                            <div v-if="data['list_return_product'] != null" class="w-100 my-bg-b-400" style="max-height:200px ;overflow-y: scroll;">
                                <div v-for="(item , index) in data['list_return_product']['data']" :key="index" class="border-bottom w-100 p-2 item-product-return d-flex justify-content-between align-items-center align-content-center">
                                    <span class="my-font-IYM my-f-12 my-color-b-500">{{item.code}}</span>
                                    <span class="my-font-IYM my-f-12 my-color-b-500">{{item.created_at}}</span>
                                    <span class="my-font-IYM my-f-11 my-color-b-400">جزئیات</span>
                                    <div v-for="(item_2 , index_2) in item['item']['data']" :key="index_2" class="d-flex justify-content-between align-content-center" style="max-height:100px ;">
                                        <span class="my-font-IYM my-f-10 my-color-b-400">{{item_2.product.name}} : {{item_2.number}} </span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="data['list_return_product'] == null">
                                <div class="border-bottom w-100 p-2 item-product-return d-flex justify-content-center align-items-center align-content-center">
                                    <span class="my-font-IYM my-f-12 my-color-b-500">مقداری یافت نشد</span>
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
        code_product_return:null,
        error_code_product_return:null,
        alert_code_product_return:null,
        data_product_return:null,
        id_product_return:null
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
        news:Array,
        status:String,
        data:Array
    },
    methods:{
        send_edit_status(){
            if(this.id_product_return != null){
                axios.post('/send/edit/product/return' , {id:this.id_product_return}).then((res)=>{
                    this.error_code_product_return = ''
                    this.alert_code_product_return = 'درخواست شما ثبت شد'
                }).catch(()=>{
                    this.error_code_product_return = 'مشکلی پیش اومده '
                                        this.alert_code_product_return = ''

                })
            }else{
                this.error_code_product_return = 'مشکلی پیش اومده'
                                    this.alert_code_product_return = ''

            } 
        },
        send_code_product_return(){
            if(!isNaN(this.code_product_return)){
                axios.post('/send/product/return' , {code:this.code_product_return}).then((res)=>{
                    this.data_product_return = res.data['data']
                    this.id_product_return = res.data['id']
                }).catch(()=>{
                    this.error_code_product_return = 'کد نامعتبر می باشد'
                })
            }else{
                this.error_code_product_return = 'لطفا با دقت بیشتری فیلد را پر کنید'
            }
        },
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
