<template>
    <header class="container box">
        <div class="row p-2 h-100 box-header p-2 p-md-1">
            <div class="col-12 col-md-5 text-center order-2 order-md-0 d-flex justify-content-start align-items-center">
                <div v-for="i in datas" :key="i.id" class="mx-2 my-pointer my-pos-relative p-2 item-box-header"
                     @mouseover="set_id_menu(i.id)" @mousemove="image=i.image" @click="open_menu"><i
                    :class="i.icon"></i> <span class="my-font-IYL my-f-13 text-item-box-header">{{ i.name }}</span>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center  order-0 order-md-1 p-2 p-md-1">
                <Link href="/">
                    <img src="/image/front/logo.png" style="height: 50px!important;" alt="logo">
                </Link>
            </div>
            <div
                class="col-12 col-md-4 text-center order-1 order-md-2 d-flex justify-content-center justify-content-md-end align-items-center p-2 p-md-1">
                <div v-if="auth" @click="open_cart"
                     class="btn-user-header btn-cart my-color-b my-pointer rounded py-2 px-3 mx-2">
                    <i class="bi bi-cart p-1"></i>
                </div>
                <Link :href="'/register/user'"
                      class="btn-user-header btn-login-register btn-login-register-a my-color-b my-pointer rounded py-2 px-3 mx-2">
                    <i class="bi bi-people p-1"></i>
                </Link>
                <div @click="open_search"
                     class="btn-user-header btn-login-search my-color-b my-pointer rounded py-2 px-3 mx-2">
                    <i class="bi bi-search"></i>
                </div>
                <div v-if="auth" @click="open_address"
                     class="btn-user-header btn-login-register my-color-b my-pointer rounded py-2 px-3 mx-2">
                    <i class="bi bi-geo-alt"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="container box side-bar">
        <div class=" row mx-2 h-100">
            <div class="col-12 col-md-6 box-side-menu box-side-menu-1 h-100 my-pos-relative">
                <div class="side-bar-menu p-2">
                    <i class="bi bi-arrow-bar-up my-pointer btn-cls-menu" @click="cls_menu"></i>
                    <span class="p-2 my-font-IYL my-f-14" v-for="items in data_sub_menu ">
                        <Link style="text-decoration: none" class=" my-color-b-500"
                              :href="'/'+items.name">{{ items.name + ' ' }} </Link>
                    </span>
                </div>
            </div>
            <div class="col-6 d-none d-md-inline-block box-side-menu box-side-menu-2 h-100">
                <div class="side-bar-menu p-2 h-100 text-center">
                    <img style="height: 100%!important;" :src="'/image/front/'+image" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-search-header row p-2" style="display: none">
            <div class="col-10 item-search">
                <input v-model="search_text" @keyup="view_product"
                       class="input-search-header my-font-IYL my-f-15 my-color-b-400" type="text"
                       placeholder="چی میخوایی ؟...">
                <i @click="cls_search" class="bi bi-arrow-bar-up my-pointer btn-cls-search"></i>
            </div>
            <div class="col-2 my-pos-relative item-search">
                <i style="font-size:30px" class="bi bi-search my-obj-center my-color-b-100"></i>
            </div>
            <div class="view-item-in-search col-12 rounded-3 mt-3 p-2 my-pos-relative">
                <div v-if="search_text == '' || !status_search" style="width: 100%;height: 100%" class="d-flex justify-content-center flex-column align-items-center not-search">
                    <img style="width: 200px;" src="/image/front/not-search.png" alt="not-search">
                    <p class="text-center my-font-IYL my-color-b-400 my-f-16">چیزی یافت نشد!</p>
                </div>
                <Link v-for="(product , index) in data_search" :key="index"
                     class="d-flex text-muted pt-3 my-pointer item-for-search" :href="'/product/'+product.slug" >
                        <img :src="'/image/product/'+product.image" class="mx-2" style="height: 50px"
                             :alt="product.name">
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark my-font-IYL my-f-12">{{product.name}}</strong>
                                <span>{{product.price}}</span>
                            </div>
                        </div>
                </Link>
            </div>
        </div>
    </div>
    <div v-if="auth" class="box-cart p-2" style="display: none">
        <div class="box-item-view-product">
            <i @click="cls_cart" class="bi bi-arrow-bar-up btn-cls-box-cart my-pointer"></i>
            <div class="box-top-item-view-product">
                <div class="d-flex text-muted pt-3">
                    <div
                        class="icon-text-total-box-top-item-view-product mx-2 d-flex justify-content-center align-items-center">
                        <i class="bi bi-cash-stack my-color-b my-f-20"></i>
                    </div>
                    <div class="pb-3 mb-0 small lh-sm w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark text-total-box-top-item-view-product">جمع کل :</strong>
                            <span>50000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show-box-top-item-view-product p-2">
                <div
                    class="item-a-box-top-item-view-product d-flex justify-content-between align-items-center my-pointer mt-2">
                    <img src="/image/product/product_1.jpg" alt="product_1">
                    <span class="my-f-12 my-color-b-800 my-font-IYL">نام محصول</span>
                    <span class="my-f-12 my-color-b-600 my-font-IYL">تعداد : 5</span>
                    <b><span class="my-f-12 my-color-b-800 my-font-IYL">قیمت کل : 50000</span></b>
                    <i class="bi bi-trash3 icon-delete-item-box-item-view-product my-f-15 my-pointer"></i>
                </div>
            </div>
        </div>
        <div class="box-total-price-cart mt-3 d-flex justify-content-between align-items-center ">
            <div class="btn-send-cart-profile my-f-13 my-color-b my-pointer py-2 px-4 me-3 my-font-IYM">
                تایید پرداخت
            </div>
            <b><span class="my-f-12 my-color-b-800 my-font-IYL ms-3">تعداد کل : 20</span></b>
        </div>
    </div>
    <div v-if="auth" class="box-address" style="display: none">
        <i style="position:relative;top: 10px;right: 10px" @click="cls_address"
           class="bi bi-arrow-bar-up btn-cls-box-cart my-pointer"></i>
        <br>
        <div class="text-box-address d-flex justify-content-center justify-content-between align-items-center p-4">
            <span class="my-f-12 my-color-b-600 my-font-IYL"><b>استان</b> : خراسان رضوی</span>
            <span class="my-f-12 my-color-b-600 my-font-IYL"><b>شهر</b> : مشهد</span>
        </div>
        <div class="text-2-box-address p-4">
            <span class="my-f-12 my-color-b-600 my-font-IYL"><b>ادرس دقیق</b> : ........................................................</span>
        </div>
        <div style="width: 127px"
             class="mb-2 btn-send-address-profile my-f-13 my-color-b my-pointer py-2 px-4 me-3 my-font-IYM">
            ویرایش ادرس
        </div>
    </div>
    <div class="blur-page "></div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import axios from 'axios'
import $ from 'jquery'
import BlurVue from "../../BlurVue";

export default {
    name: "HeaderVue",
    data: () => ({
        id_menu: 0,
        data_sub_menu: null,
        image: '',
        search_text: '',
        show_blur: 1,
        data_search: null,
        status_search:true
    }),
    components: {
        BlurVue,
        Link
    },
    props: {
        auth: Boolean,
        datas: Array
    },
    methods: {
        view_product() {
            if (this.search_text != '') {
                axios.post('/search/product', {data: this.search_text}).then((res) => {
                    if(res.data != ''){
                        this.data_search = res.data
                        this.status_search = true
                    }else
                    {
                        this.status_search = false
                    }

                }).catch((res) => {
                    console.log('no')
                })
            } else {
                console.log('پیدا نشد')
                this.data_search = null
            }
        },
        b_on() {
            $('.blur-page').fadeIn()
        },
        b_off() {
            $('.blur-page').fadeOut()
        },
        open_address() {
            $('.box-address').slideDown()
            this.b_on()
        },
        cls_address() {
            $('.box-address').slideUp()
            this.b_off()
        },
        cls_cart() {
            $('.box-cart').slideUp()
            this.b_off()
        },
        open_cart() {
            $('.box-cart').slideDown()
            this.b_on()
        },
        test() {
            console.log('test')
        },
        set_id_menu(id) {
            this.id_menu = id
            this.b_on()
        },
        cls_menu() {
            $('.side-bar').stop().slideUp()
            this.b_off()
        },
        cls_search() {
            $('.box-search-header').stop().slideUp()
            this.b_off()
        },
        open_search() {
            this.b_on()
            $('.box-search-header').slideDown()
        },
    },
    mounted() {
        $('.item-box-header').hover(() => {
            axios.post('/view/menu', {id: this.id_menu}).catch((res) => {
                this.data_search = res.data
            }).then((res) => {
                this.data_sub_menu = res.data
                $('.side-bar').stop().slideDown()
            })
        })

    }
}
</script>

<style scoped>

</style>
