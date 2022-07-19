<template>

    <div class="container box my-bg-b-400">
        <div class="w-100 my-bg-b my-sc-0-8 rounded-3" style="height: 100vh;">
        <div class="w-100 my-bg-b my-sc-0-9 rounded-3 p-3 d-flex flex-column align-item-center" style="height: 100vh;">
            <div class="w-100 my-pos-rel my-4" style="height: 100px;">
                <img class="my-obj-center" src="/image/icon/ok.png" alt="ok">
            </div>
            <p class="my-font-IYM my-f-13 my-color-b-700 text-center" dir="rtl">{{msg}}</p>
            <p class="my-font-IYL my-f-13 text-center">{{code}}</p>
            <div class="d-flex justify-content-center align-content-center my-3 ">
                <a href="/" class="btn btn-warning my-color-b my-font-IYLmy-f-11">بازگشت به سایت</a>
            </div>
        </div>
        </div>
    </div>

</template>

<script setup>
const props = defineProps({
    code:String,
    msg:String,
})
</script>