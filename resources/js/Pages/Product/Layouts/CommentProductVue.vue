<template>
    <div class="row">
            <p class="my-font-IYM my-color-b-700  my-f-15">نظرات</p>
            <div class="col-12 row">
                <div class="col-12 col-md-9 p-3  rounded-3 shadow my-3 my-font-IYL my-color-b-600 my-f-13 my-2 lh-lg my-pos-relative">
                    <i @click="setComment('1')" class="bi bi-list btn-menu-comment my-f-16 my-pointer"></i>
                    <div :class="'menu-comment shadow-sm' + ' '+ 'menu_comment_'+1">
                        <div class="d-flex rounded-2 justify-content-between align-content-center py-2 px-2 my-pointer reply-comment">
                            <i class="bi bi-reply my-f-16"></i>
                            <span class="">پاسخ</span>
                        </div>
                        <div class="d-flex rounded-2 mt-1 justify-content-between align-content-center py-2 px-2 my-pointer flag-comment">
                            <i class="bi bi-flag my-f-16"></i>
                            <span class="">گزارش</span>
                        </div>
                        <i @click="clsMenuComment" class="bi bi-arrow-bar-up my-2 my-f-16 my-pointer"></i>
                </div>
                    <div class="w-100 d-flex justify-content-between align-content-center ">
                        <div>
                            <i class="bi bi-person icon-comment-product my-f-16"></i> {{'نام کاربری'}} |
                            <span class="vote-good d-md-inline-block d-none">
                                 <i class="bi bi-hand-thumbs-up"></i> از این محصول راضی هستم
                            </span>
                            <span class="vote-m d-md-inline-block d-none">
                                 <i class="bi bi-app"></i> از این محصول راضی هستم
                            </span>
                            <span class="vote-bad d-md-inline-block d-none">
                                 <i class="bi bi-hand-thumbs-down"></i> از این محصول راضی هستم
                            </span>
                        </div>
                        <div class="my-color-b-300">
                             <span class="my-f-12">ساعت ارسال</span> <i class="bi bi-clock icon-comment-product my-f-16"></i>
                        </div>
                    </div>
                    <div class="my-line my-2"></div>
                    <p dir="rtl" class="my-color-b-700 my-f-13 text-end">fddسشیبسیبسصیبctetur adipisicing elit. Commodi quaerat, quidem, repellat obcaecati minus hic id tempore iste optio eius cupiditate voluptas enim laudantium voluptates sunt dignissimos facere eaque soluta.</p>
                </div>
                <div class="col-3 d-none d-md-inline-block p-3  rounded-3 bg-light shadow my-3 my-font-IYL my-color-b-600 my-f-13 my-2 lh-lg">
                    رای گیری
                    <div class="my-line"></div>
                    <div class="my-2">
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">طراحی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;" :class="'h-100 wl-' +'30'"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">طراحی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;" :class="'h-100 wl-' +'30'"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">طراحی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;" :class="'h-100 wl-' +'30'"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">طراحی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;" :class="'h-100 wl-' +'30'"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-3">
                            <span class="my-f-10 my-font-IYL my-color-b-400">طراحی</span>
                            <div class="w-75 line-comment-product" style="height: 15px;">
                                <div style="width: 20%; float: left;    border-radius: 100px;    background-color: #ff7272;" :class="'h-100 wl-' +'30'"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 bg-white shadow-sm p-3 my-font-IYL">
                <div class="w-100 d-flex justify-content-between align-content-center ">
                    <div>
                        <i class="bi bi-person icon-comment-product my-f-16"></i> {{'نام کاربری'}}
                    </div>
                        <div class="my-color-b-300">
                                <span class="my-f-12">ساعت ارسال</span> <i class="bi bi-clock icon-comment-product my-f-16"></i>
                        </div>
                    </div>
                <div class="my-line my-2"></div>
                <p dir="rtl" class="my-color-b-700 my-f-13 text-end">fddسشیبسیبسصیبctetur adipisicing elit. Commodi quaerat, quidem, repellat obcaecati minus hic id tempore iste optio eius cupiditate voluptas enim laudantium voluptates sunt dignissimos facere eaque soluta.</p>
            </div>
        </div>
</template>

<script>
export default {
    name:'CommentProductVue'
}
</script>