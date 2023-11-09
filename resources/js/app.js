import './bootstrap';
import {createApp} from 'vue';
import components from '@/components/UI/autolouder.js'
import App from './components/App.vue';

const app = createApp(App);

components.forEach(component => {
    app.component(component.name, component)
})

app.mount("#app")
