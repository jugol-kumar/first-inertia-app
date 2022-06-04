import { createApp, h } from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress';
import Layout from "./Shared/Layout";


createInertiaApp({
    resolve: async name =>{
       let page = (await import(`./Pages/${name}`)).default;
       page.layout ??= Layout;
       return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link)
            // .component("Layout", Layout)
            .component('Head', Head)
            .mount(el)
    },

    title: title =>`My App | ${title} - By Jugol Kumar`,

});


InertiaProgress.init({
    color:'red',
    showSpinner:true,
});