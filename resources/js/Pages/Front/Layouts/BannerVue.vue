<template>
    <div class="container box my-3">
        <div v-if="location == 'start'" v-for="(item , index) in data" class="row" :key="index">
            <Link class="w-100 h-100" :href="item.url">
                <img  :src="'/image/banner/'+item.image" class="w-100 rounded-3 shadow-lg" :alt="item.address">
            </Link>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
export default {
    name: "BannerVue",
    components:{
        Link,
    },
    props:{
        data:Array,
        location:String
    }
}
</script>

<style scoped>

</style>
