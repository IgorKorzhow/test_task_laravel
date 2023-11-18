import './bootstrap';
import {createPinia} from 'pinia';
import {createApp} from 'vue';
import components from '@/components/UI/autolouder.js'
import App from './components/App.vue';
import router from "@/router/index.js";
import {vue3Spinner} from "vue3-spinner";

const app = createApp(App);

const pinia = createPinia();

components.forEach(component => {
    app.component(component.name, component)
})

app
    .use(pinia)
    .use(vue3Spinner)
    .use(router)
    .mount("#app")
