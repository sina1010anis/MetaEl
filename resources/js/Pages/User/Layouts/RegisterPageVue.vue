<template>
    <div style="height: 100vh" class="w-100">
        <div class="my-obj-center box-login-register p-4 rounded-3">
            <p class="my-f-17 my-font-IYL my-color-b-400 text-end"><img src="/image/front/logo.png" style="width: 30px!important;" alt="logo">عضویت</p>
            <div class="my-line"></div>
            <form action="/register" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <div class="input-group my-4">
                    <input type="text" name="name" class="  my-font-IYM my-f-13 my-color-b-600" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <input type="text" name="email" class="  my-font-IYM my-f-13 my-color-b-600" placeholder="ایمیل (اختیاری)" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <input type="text" name="mobile" class="  my-font-IYM my-f-13 my-color-b-600" placeholder="موبایل" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-4">
                    <input type="password" name="password" class="  my-font-IYM my-f-13 my-color-b-600" placeholder="پسورد" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn my-font-IYL my-f-14 d-block w-100">ثبت نام</button>
                </div>
            </form>
            <div class="my-line my-3"></div>
            <p class="my-font-IYL my-f-12 d-block w-100">برای ورود <Link>کلیک کنید</Link></p>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "LoginPageVue",
    components:{
      Link
    },
    props:{
        csrf:String
    }
}
</script>

<style scoped>

</style>
