<template>
        <div class="container box shadow" style="width:100%;height: 100vh;">
            <div class="bg-white row p-2 w-100 h-100">
                <div class="col-2 my-bg-b-100">
                <!-- MenuBar -->
                    <div class="w-100 p-1">
                        <p class="d-none d-md-block my-font-IYL my-f-10 my-color-b-300 text-end" dir="rtl">1399/99/99 بهمن اسنفدر</p>
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
                <div class="col-10 p-2 my-bg-b-300">
                    
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
    }
}
</script>

<style scoped>

</style>
