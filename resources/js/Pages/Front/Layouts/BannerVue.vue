<template>
    <div class="container box my-5">
        <div v-if="location == 'start'" v-for="(item , index) in data" class="row" :key="index">
            <Link class="w-100 h-100" :href="item.url" v-if="item.location == 'start'">
                <img :src="'/image/banner/'+item.image" class="w-100 rounded-3" :alt="item.address">
            </Link>
        </div>
        <div v-if="location == 'center'" class="row">
            <div v-for="(item , index) in data" :key="index" class="col-12 col-md-6">
                <div class="shadow-sm">
                    <Link class="" :href="item.url" v-if="item.location == 'center'">
                        <img :src="'/image/banner/'+item.image" class="rounded-3 " style="width: 100%;height: 100%"
                             :alt="item.address">
                    </Link>
                </div>
            </div>
        </div>
        <div v-if="location == 'end'" v-for="(item , index) in data" class="row" :key="index">
            <Link class="w-100 h-100" :href="item.url" v-if="item.location == 'end'">
                <img :src="'/image/banner/'+item.image" class="w-100 rounded-3" :alt="item.address">
            </Link>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
    name: "BannerVue",
    data: () => ({
        ST: null
    }),
    components: {
        Link,
    },
    props: {
        data: Array,
        location: String
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
