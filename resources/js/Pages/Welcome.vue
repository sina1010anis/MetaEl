<template>
    <p>Page Welcome</p>
    <Link href="/send">go to Page Send</Link>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    name: "Welcome",
    components:{
        Link
    }
}
</script>

<style scoped>

</style>
