import './bootstrap';
import { createApp } from 'vue';
import './resources/styles/app.scss'
import App from './App.vue';
import UserRouter from './routes/index';

const app = createApp(App);

app.use(UserRouter);

app.mount('#app');
