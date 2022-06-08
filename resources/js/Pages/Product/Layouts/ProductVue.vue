<template>
    <div class="container box my-3">
        <div class="row">
            <div class="col-md-3 col-12 order-1 order-md-0 h-100">
                <div class="w-100 p-2 rounded-3 shadow" style="height: 430px;background-color: #f8f8f8">
                    <p class="my-font-IYL my-color-b-400 my-f-11 my-2">برگه ارسال</p>
                    <div class="my-line"></div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-mailbox" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">زمان رسال</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-mailbox" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">هزینه ارسال</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-mailbox" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">قیمت نهایی</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-mailbox" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">موجودی انبار</span>
                    </div>
                    <div class="w-100 my-3 d-flex justify-content-between align-items-center px-2 my-2">
                        <i class="bi bi-mailbox" style="color:#ff6c6c;font-size:30px"></i>
                        <span class="my-font-IYL my-color-b-400 my-f-13">تعداد نظرات</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 order-1 order-md-0">
                <div class="w-100 p-2">
                    <h4 class="my-font-IYM my-color-b-600">{{data.name}}</h4>
                    <p class="my-font-IYL my-color-b-400 my-f-12 my-4" align="right">{{menu_a.name}} / <Link style="text-decoration: none" href="/test">{{menu_s.name}}</Link></p>
                    <div class="my-line"></div>
                    <p class="my-font-IYL my-color-b-600 my-f-13 my-2 lh-lg">
                        {{data.description}}
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 my-pos-rel order-0 order-md-1" style="height: 430px">
                <div class="w-100 p-2  h-100">
                    <div class="my-obj-center w-100 text-center mt-4" >
                        <img :src="(srcImage == '') ? '/image/product/'+data.image : srcImage" style="height: 300px" class=" my-2" :alt="data.name">
                        <div class=" w-100 d-flex flex-nowrap overflow-scroll align-items-center justify-content-center" style="height: 60px">
                            <img  v-for="img in image" @click="setImage('/image/product/'+img.image)" :src="'/image/product/'+img.image" :alt="img.name" class="h-100 mx-2 rounded-3 my-pointer shadow-sm">
                            <img  @click="setImage('/image/product/'+data.image)" :src="'/image/product/'+data.image" :alt="data.name" class="h-100 mx-2 rounded-3 my-pointer shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
export default {
    name: "ProductVue",
    data:()=>({
        srcImage:'',
    }),
    components:{
        Link,
    },
    props:{
        data:Array,
        image:Array,
        menu_s:Array,
        menu_a:Array,
    },
    methods:{
        setImage(src){
            this.srcImage = src
        }
    }
}
</script>

<style scoped>

</style>
