import './bootstrap';
import {createPinia} from 'pinia';
import {createApp} from 'vue';
import components from '@/components/UI/autolouder.js'
import App from './components/App.vue';

const app = createApp(App);

const pinia = createPinia();

components.forEach(component => {
    app.component(component.name, component)
})

app.use(pinia).mount("#app")
