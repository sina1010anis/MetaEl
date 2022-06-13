<template>
    <div class="container box my-5">
        <p class="m-2 my-font-IYM text-center title-box-product">{{ title }}</p>
        <div class="row shadow-lg mt-4 my-pos-rel">
            <div class="col-md-2  d-none d-md-inline-block p-2 my-pos-relative my-sc-0-6" style="height: 250px;">
                <img class="h-100 my-obj-center" src="/image/product/image_list_1.png" alt="item_list">
            </div>
            <div class="col-md-10 col-12 p-2 row d-flex flex-nowrap overflow-scroll" style="height: 250px;">
                    <Link v-for="(product , index) in products" :key="index" style="width: 180px;height: 100%"
                          class="mx-2 p-1 border rounded-3 item-product" :href="'/product/'+product.slug">
                        <div class="my-h-50 text-center my-2">
                            <img loading="lazy" :src="'/image/product/'+product.image" style="height: 100%;"
                                 :alt="product.name">
                        </div>
                        <div class="mt-2">
                            <p class="my-f-11 my-color-b-700 my-font-IYM">{{ product.name }}</p>
                            <p class="my-f-13 my-color-b-700 my-font-IYM"><b>{{ product.price }}</b></p>
                            <div class="mb-2 text-start" style="color: rgb(233 221 80)">
                                4.4<i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </Link>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "ProductVue",
    components: {
        Link
    },
    props: {
        title: String,
        products: Array
    }
}
</script>

<style scoped>

</style>
