<template>
    <div class="row">
        <p class="my-font-IYM my-color-b-700  my-f-15">نظرات</p>
        <div v-for="(comment , index) in data['data']" :key="index">
            <div  class="col-12 row">
                <div
                    class="col-12 col-md-9 p-3  rounded-3 shadow my-3 my-font-IYL my-color-b-600 my-f-13 my-2 lh-lg my-pos-relative">
                    <i @click="setComment(comment.id)" class="bi bi-list btn-menu-comment my-f-16 my-pointer"></i>
                    <div :class="'menu-comment shadow-sm' + ' '+ 'menu_comment_'+comment.id">
                        <div
                            class="d-flex rounded-2 justify-content-between align-content-center py-2 px-2 my-pointer reply-comment" v-if="auth" @click="open_page_reply_comment">
                            <i class="bi bi-reply my-f-16"></i>
                            <span class="">پاسخ</span>
                        </div>
                        <div
                            class="d-flex rounded-2 mt-1 justify-content-between align-content-center py-2 px-2 my-pointer flag-comment">
                            <i class="bi bi-flag my-f-16"></i>
                            <span class="">گزارش</span>
                        </div>
                        <i @click="clsMenuComment(comment.id)" class="bi bi-arrow-bar-up my-2 my-f-16 my-pointer"></i>
                    </div>
                    <div class="w-100 d-flex justify-content-between align-content-center ">
                        <div>
                            <i class="bi bi-person icon-comment-product my-f-16"></i> {{ comment.user.name }} |
                            <span v-if="comment.vote == 1" class="vote-good d-md-inline-block d-none">
                                    <i class="bi bi-hand-thumbs-up"></i> از این محصول راضی هستم
                                </span>
                            <span v-if="comment.vote == 2" class="vote-m d-md-inline-block d-none">
                                    <i class="bi bi-app"></i> نسبتا کارا بود
                                </span>
                            <span v-if="comment.vote == 3" class="vote-bad d-md-inline-block d-none">
                                    <i class="bi bi-hand-thumbs-down"></i> از این محصول راضی نیستم
                                </span>
                        </div>
                        <div class="my-color-b-300">
                            <span class="my-f-12">{{ comment.created_at }}</span> <i
                            class="bi bi-clock icon-comment-product my-f-16"></i>
                        </div>
                    </div>
                    <div class="my-line my-2"></div>
                    <h6 class="my-color-b-700 text-end my-font-IYM">{{ comment.subject }}</h6>
                    <p dir="rtl" class="my-color-b-800 my-f-13 text-end">{{ comment.text }}</p>
                </div>
                <div
                    class="col-3 d-none d-md-inline-block p-3  rounded-3 bg-light shadow my-3 my-font-IYL my-color-b-600 my-f-13 my-2 lh-lg">
                    رای گیری
                    <div class="my-line"></div>
                    <div class="my-2">
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">طراحی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;"
                                    :class="'h-100 wl-' +comment.attr[0].step_1"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">کارایی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;"
                                    :class="'h-100 wl-' +comment.attr[0].step_2"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">کیفیت</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;"
                                    :class="'h-100 wl-' +comment.attr[0].step_3"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">ارزش</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;"
                                    :class="'h-100 wl-' +comment.attr[0].step_4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="(reply , index) in comment.reply['data']" :key="index" class="col-10 mt-2 bg-white shadow-sm p-3 my-font-IYL">
                <div class="w-100 d-flex justify-content-between align-content-center ">
                    <div>
                        <i class="bi bi-arrow-90deg-up"></i>
                    </div>
                    <div class="my-color-b-300">
                        <span class="my-f-12">{{reply.created_at}}</span> <i class="bi bi-clock icon-comment-product my-f-16"></i>
                    </div>
                </div>
                <div class="my-line my-2"></div>
                <p dir="rtl" class="my-color-b-700 my-f-13 text-end">{{reply.text}}</p>
            </div>
        </div>
    </div>
    <page-alert-vue v-if="auth" :class_name="'new-comment-reply-product'" :title="'پاسخ به ...'" :tips="'پس از ثبت کاکمت با تایید مدیر قابل نمایش می باشد.'">
        <template #option>
            <form :action="'/reply/comment/product'" method="post">
                <input type="hidden" :value="csrf" name="_token">
                <input type="hidden" :value="comment_id" name="comment_product_id">
                <div class="input-group">
                    <textarea name="text" class="form-control my-font-IYL my-f-12 my-color-b-700 text-end box-text-comment-product" dir="rtl" aria-label="With textarea"></textarea>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <button type="submit" class="my-font-IYL my-color-b my-f-14 px-3 py-1 shadow-sm btn-send-comment-product rounded-3">ارسال</button>
                </div>
            </form>
        </template>
    </page-alert-vue>
    <div class="blur-page "></div>
</template>

<script>
import $ from 'jquery'
import PageAlertVue from "../../Front/Layouts/PageAlertVue";
export default {
    name: 'CommentProductVue',
    data:()=>({
        comment_id:null,
    }),
    props: {
        data: Array,
        auth:String,
        csrf:String
    },
    components:{
        PageAlertVue
    },
    methods: {
        clsMenuComment(id) {
            this.comment_id = id
            $('.menu_comment_' + id).fadeOut()
        },
        setComment(id) {
            this.comment_id = id
            $('.menu-comment').fadeOut()
            $('.menu_comment_' + id).fadeIn()
        },
        open_page_reply_comment(){
            $('.menu-comment').fadeOut()
            $('.new-comment-reply-product').fadeIn()
            $('.blur-page').fadeIn()
        },
    }
}
</script>
