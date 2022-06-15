<template>
    <div :class="'page-alert my-obj-center ' + ' ' + class_name">
        <div class="top-page-alert p-2 d-flex justify-content-between align-content-center">
            <i @click="cls_btn" class="bi bi-x-lg my-pointer"></i>
            <span class="my-f-10 my-font-IYL my-color-b-300 ">ورزژن 2.3</span>
        </div>
        <div class="my-li"></div>
        <div class="w-100 bg-white p-3 box-option">
            <p v-if="title != null" class="text-end my-color-b-600 my-font-IYM my-f-14">{{title}}</p>
            <slot name="option" />
            <div v-if="tips != null" class="my-line my-2"></div>
            <p v-if="tips != null " class="text-end my-font-IYM my-f-11 tips-page-alert"><i class="bi bi-exclamation-lg my-f-14"></i> {{tips}}</p>
        </div>
    </div>
</template>

<script>
import $ from 'jquery'
export default {
    name : "PageAlertVue",
    props:{
        class_name:String,
        title:String,
        tips:String,
    },
    methods:{
        cls_btn(){
            $('.page-alert').fadeOut('fast');
            $('.blur-page').fadeOut('slow');
        },
    }
}
</script>
