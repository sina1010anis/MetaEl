<template>
    <div  class="box-item-setup-user shadow py-2 px-3 d-flex justify-content-between align-content-center">
        <i v-if="auth" @click="open_box_new_comment_product" class="bi bi-chat my-f-18 my-color-b mx-2 my-pointer"></i>
        <i v-if="auth && save == 0" @click="save_product_to_panel" class="my-f-18 my-color-b my-pointer mx-2 btn-save-product bi bi-bookmark"></i>
        <i class="bi bi-arrow-left-right my-f-18 my-color-b my-pointer"></i>
    </div>
    <page-alert-vue v-if="auth" :class_name="'new-comment-product'" :title="'کامنت جدید'" :tips="'پس از ثبت کاکمت با تایید مدیر قابل نمایش می باشد.'">
        <template #option>
            <form :action="'/comment/product'" method="post">
                <input type="hidden" :value="csrf" name="_token">
                <input type="hidden" :value="id" name="product_id">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control my-font-IYL my-f-12 my-color-b-700 text-end p-2" name="subject" placeholder="موضوع">
                </div>
                <div class="input-group">
                    <textarea v-model="text" name="text" class="form-control my-font-IYL my-f-12 my-color-b-700 text-end box-text-comment-product" dir="rtl" aria-label="With textarea"></textarea>
                </div>
                <div class="my-line"></div>
                <div class="mt-3">
                    <div>
                        <label for="customRange2" class="form-label my-f-12 my-color-b-500 text-center my-font-IYL">طراحی</label>
                        <input name="step_1" type="range" value="0" class="form-range" min="0" max="10" id="customRange2">
                    </div>
                    <div>
                        <label for="customRange2" class="form-label my-f-12 my-color-b-500 text-center my-font-IYL">کارایی</label>
                        <input name="step_2" type="range" value="0" class="form-range" min="0" max="10" id="customRange2">
                    </div>
                    <div>
                        <label for="customRange2" class="form-label my-f-12 my-color-b-500 text-center my-font-IYL">کیفیت</label>
                        <input name="step_3" type="range" value="0" class="form-range" min="0" max="10" id="customRange2">
                    </div>
                    <div>
                        <label for="customRange2" class="form-label my-f-12 my-color-b-500 text-center my-font-IYL">ارزش</label>
                        <input name="step_4" type="range" value="0" class="form-range" min="0" max="10" id="customRange2">
                    </div>
                </div>
                <div class="text-end my-f-13 mt-color-b-400 my-font-IYM">حس خود را نسبت به این کالا </div>
                <div class="d-flex justify-content-between align-content-center box-vote-comment-product mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1"  name="vote" id="flexRadioDefault1">
                        <label class="form-check-label my-font-IYL my-f-12 my-color-b-300" for="flexRadioDefault1">
                        راضی هستم
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"  value="2" name="vote" id="flexRadioDefault2" checked >
                        <label class="form-check-label my-font-IYL my-f-12 my-color-b-300" for="flexRadioDefault2">
                        نظری ندارم
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"  value="3" name="vote" id="flexRadioDefault3" >
                        <label class="form-check-label my-font-IYL my-f-12 my-color-b-300" for="flexRadioDefault3">
                        راضی نیستم
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center ">
                    <button type="submit" class="my-font-IYL my-color-b my-f-14 px-3 py-1 shadow-sm btn-send-comment-product rounded-3">ارسال</button>
                </div>
            </form>
        </template>
    </page-alert-vue>
    <div class="blur-page "></div>
</template>

<script>
import PageAlertVue from '../../Front/Layouts/PageAlertVue'
import axios from 'axios';
import $ from 'jquery'
export default {
    name:"SetupUserVue",
    data:()=>({
        text:null,
    }),
    props:{
        auth:String,
        csrf:String,
        url:String,
        id:Number,
        save:Number
    },
    components:{
        PageAlertVue
    },
    methods:{
        open_box_new_comment_product(){
            $('.new-comment-product').fadeIn();
            $('.blur-page').fadeIn();
        },
        save_product_to_panel(){
            $('.btn-save-product').fadeOut();
            axios.post('/save/product' , {id:this.id}).then((res)=>{
                console.log(res.data);
            }).catch(()=>{
                console.error('Error 580')
            })
        }
    }
}
</script>
