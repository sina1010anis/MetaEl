<template>
    <ProfileVue :data="data" :status="data['status']" :auth="auth" :news="data['news']" :time="data['time']" :factor="data['factor']" :comment="data['comment']" :address="data['address']"/>
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