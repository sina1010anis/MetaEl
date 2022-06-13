<template>
    <div v-if="!auth" class="box-item-setup-user shadow py-2 px-3 d-flex justify-content-between align-content-center">
        <i class="bi bi-chat my-f-18 my-color-b my-pointer"></i>
        <i class="bi bi-bookmark my-f-18 my-color-b my-pointer"></i>
    </div>
</template>

<script>
export default {
    name:"SetupUserVue",
    props:{
        auth:String
    }
}
</script>