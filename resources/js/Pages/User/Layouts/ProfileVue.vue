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
                            <div class="d-flex justify-content-center flex-column my-pointer my-3 align-items-center">
                                <img src="/image/icon/order.png" style="width:70px;" alt="order">
                                <p class="my-font-IYL my-f-11 my-color-b-400">1984198516541</p>
                            </div>
                            <!-- /View Factor -->
                        </div>
                    </div>
                    <div class="col-md-5 col-12" style="height: 95%!important;" >
                        <div class="h-50 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">کامنت های ارسالی</h6>
                            <div class="my-line"></div>
                            <div class="d-flex justify-content-center flex-column my-pointer my-3 align-items-center">
                                <img src="/image/icon/order.png" style="width:70px;" alt="order">
                                <p class="my-font-IYL my-f-11 my-color-b-400">1399/99/99</p>
                            </div>
                        </div>
                        <div class="h-50 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">ادرس</h6>
                            <div class="my-line"></div>
                            <div class="d-flex justify-content-center flex-column my-pointer my-3 align-items-center">
                                <img src="/image/icon/order.png" style="width:70px;" alt="order">
                                <p class="my-font-IYL my-f-11 my-color-b-400">1399/99/99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12" >
                        <div class="h-100 section-panel-user my-2 p-2" style="overflow-y: scroll;">
                            <h6 class="my-font-IYL my-f-12 my-color-b-600">جدیدترین اخبار</h6>
                            <div class="my-line"></div>
                            <div class="d-flex justify-content-center flex-column my-pointer my-3 align-items-center">
                                <img src="/image/icon/order.png" style="width:70px;" alt="order">
                                <p class="my-font-IYL my-f-11 my-color-b-400">1399/99/99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    name: "ProfileVue",
    components:{
        Link
    },
    props:{
        time:String,
        auth:String
    }
}
</script>

<style scoped>

</style>
