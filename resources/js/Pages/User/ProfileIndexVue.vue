<template>
    <ProfileVue :auth="auth" :time="data['time']" />
</template>

<script setup>
    import HeaderVue from '../Front/Layouts/HeaderVue';
    import FooterVue from '../Front/Layouts/FooterVue';
    import ProfileVue from '../User/Layouts/ProfileVue';
    const props = defineProps({
        auth:String,
        data:Array,
    });

</script>