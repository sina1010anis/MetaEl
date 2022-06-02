<template>

    <div class="container box mt-3">
        <div class="row">
            <div class="col-12 col-md-5 my-pos-relative overflow-hidden" style="height: 400px">
                <div class="cir-1 cir"></div>
                <div class="cir-2 cir"></div>
                <div class="w-100 text-center my-pos-relative my-obj-center">
                    <swiper @mousemove="setDataSlider" :slides-per-view="1" :space-between="50" @slideChange="onSlideChange" Autoplay>
                        <swiper-slide v-for="(img , index)  in image" :key="index">
                            <p :id="index" hidden>{{img.name}}</p>
                            <img :src="'/image/product/'+img.image" :alt="img.name">
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
            <div class="col-12 col-md-7 my-pos-relative" style="height: 400px">
                <div class="w-100 p-3">
                    <h3 class="my-font-IYM my-color-b-700">{{(!statuesS) ? imageFi[0] :dataImageSlider.subject }}</h3>
                    <p class="my-font-IYL my-f-13 lh-lg mt-4 my-color-b-500">
                        {{(!statuesS) ? imageFi[1] : dataImageSlider.description}}
                    </p>
                    <Link :href="(!statuesS) ? imageFi[1] : dataImageSlider.url" class="btn-show-slider py-2 px-5 my-f-16 my-font-IYM">
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
        imageFi:[],
        statuesS:false,
        dataImageSlider:{}
    }),
    components: {
        Swiper,SwiperSlide,Link,
    },
    props: {
        images: Array
    },
    mounted() {
        this.image = this.images
        this.imageFi.push(this.image[0].subject)
        this.imageFi.push(this.image[0].description)
        this.imageFi.push(this.image[0].url)
    },
    methods:{
        test(){
            console.log('te')
        },
        setDataSlider(){
            this.dataImageSlider['subject'] =this.subjectSlider_S[this.subjectSlider_S.length-1]
            this.dataImageSlider['description'] = this.descriptionSlider_S[this.descriptionSlider_S.length-1]
            this.dataImageSlider['url'] = this.urlSlider_S[this.urlSlider_S.length-1]
            this.statuesS = this.statusSlider_S[this.statusSlider_S.length-1]
        },
    },
    setup() {
        var subjectSlider_S = [];
        var descriptionSlider_S = [];
        var urlSlider_S = [];
        var statusSlider_S = [];
        const onSlideChange = (swiper) => {
            const id = swiper.activeIndex;
            const tag = document.getElementById(id).innerText;
            axios.post('/get/data/image' , {name:tag}).then((res)=>{
                subjectSlider_S.push(res.data.subject)
                descriptionSlider_S.push(res.data.description)
                urlSlider_S.push(res.data.url)
                statusSlider_S.push(true)
                // subjectSlider = res.data.subject
                // descriptionSlider = res.data.description
                // urlSlider = res.data.url
                // statuesSlider = true
            }).catch((res)=>{
                console.error(res.data)
            })
        };
        const onSwiper = (swiper) => {
            console.log(swiper.activeIndex);
        };
        return {
            onSwiper,
            onSlideChange,
            subjectSlider_S,
            descriptionSlider_S,
            urlSlider_S,
            statusSlider_S,
            // subjectSlider,descriptionSlider,urlSlider,statuesSlider
        };
    },
}
</script>

<style scoped>

</style>
