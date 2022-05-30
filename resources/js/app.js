require('./bootstrap');
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import {createApp , h} from "vue";
import Send from './Pages/Send'
import Welcome from './Pages/Welcome'

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
        Send,Welcome
    }
});

app.mount('#app')
