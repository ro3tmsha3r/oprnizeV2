import { createApp } from 'vue'
import router from "./router";
import App from './views/App'
import ArgonDashboard from "./plugins/argon-dashboard";
import ElementPlus from 'element-plus'
import "element-plus/lib/theme-chalk/index.css";

const app = createApp(App)
app.use(router);
app.use(ElementPlus);
app.use(ArgonDashboard);
app.mount('#app')