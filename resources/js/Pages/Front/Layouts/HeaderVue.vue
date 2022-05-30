<template>
  <header class="container box" >
      <div class="row p-2 h-100 box-header">
          <div class="col-12 col-md-5 text-center order-1 order-md-0 d-flex justify-content-start align-items-center">
                <div class="mx-2 my-pointer"><i class="bi bi-phone icon-item-box-header"></i> <span class="my-font-IYL my-f-15 text-item-box-header">موبایل</span></div>
                <div class="mx-2 my-pointer"><i class="bi bi-phone icon-item-box-header"></i> <span class="my-font-IYL my-f-15 text-item-box-header">موبایل</span></div>
                <div class="mx-2 my-pointer"><i class="bi bi-phone icon-item-box-header"></i> <span class="my-font-IYL my-f-15 text-item-box-header">موبایل</span></div>
                <div class="mx-2 my-pointer"><i class="bi bi-phone icon-item-box-header"></i> <span class="my-font-IYL my-f-15 text-item-box-header">موبایل</span></div>
          </div>
          <div class="col-12 col-md-3 text-center  order-0 order-md-1">
              <Link href="/">
                  <img src="image/front/logo.png" style="height: 50px!important;" alt="logo">
              </Link>
          </div>
          <div class="col-12 col-md-4 text-center order-2 order-md-2 d-flex justify-content-end align-items-center">
              <div class="btn-login-register my-color-b my-pointer rounded py-2 px-3">
                  <span class="my-font-IYL my-f-13 text-btn-login-register">ورود / عضویت</span><i class="bi bi-people p-1"></i>
              </div>
          </div>
      </div>
  </header>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "HeaderVue",
    components:{
        Link
    }
}
</script>

<style scoped>

</style>
