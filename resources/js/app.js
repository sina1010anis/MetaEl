require('./bootstrap');
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import {createApp , h} from "vue";
import Send from './Pages/Send'
import Welcome from './Pages/Front/HomePage'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import '../css/my-style.css'
import carousel from 'vue-owl-carousel'
createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
const app = createApp({
    data:()=>({
        text:'sina'
    }),
    components:{
        Send,Welcome,carousel
    },
    methods:{
        btn_test(){
            alert('ok');
        }
    }
});
app.mount('#app')
