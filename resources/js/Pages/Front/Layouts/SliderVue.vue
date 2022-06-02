<template>

    <div class="container box mt-3">
        <div class="row">
            <div class="col-12 col-md-5 my-pos-relative overflow-hidden" style="height: 400px">
                <div class="cir-1 cir"></div>
                <div class="cir-2 cir"></div>
                <div class="w-100 text-center my-pos-relative my-obj-center">
                    <swiper :slides-per-view="1" :space-between="50" @slideChange="onSlideChange">
                        <swiper-slide>
                            <img src="/image/product/product_1.jpg" class="" alt="product_1">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="/image/product/product_2.jpg" class="" alt="product_1">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="/image/product/product_1.jpg" class="d-i" alt="product_1">
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
            <div class="col-12 col-md-7 my-pos-relative" style="height: 400px">
                <div class="w-100 p-3">
                    <h3 class="my-font-IYM my-color-b-700">توی گیم کم نمیاره ....</h3>
                    <p class="my-font-IYL my-f-13 lh-lg mt-4 my-color-b-500">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                    </p>
                    <Link class="btn-show-slider py-2 px-5 my-f-16 my-font-IYM">
                        برسی
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import {Link} from '@inertiajs/inertia-vue3'
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/scrollbar';
export default {
    name: "Slider",
    data: () => ({
        image: [],
    }),
    components: {
        Swiper,SwiperSlide,Link
    },
    props: {
        images: Array
    },
    mounted() {
        this.image = this.images
    },
    setup() {
        const onSlideChange = (swiper) => {
            console.log(swiper);
        };
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        return {
            onSwiper,
            onSlideChange,
        };
    },
}
</script>

<style scoped>

</style>
