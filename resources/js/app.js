import { createApp } from 'vue'
import router from "./router";
import App from './views/App'
import ArgonDashboard from "./plugins/argon-dashboard";
import ElementPlus from 'element-plus'
import 'element-plus/lib/theme-chalk/index.css'


import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
  state () {
    return {
        employees: [],
    }
  },
  getters: {
    getEmployees(state) {
        return state.employees;
    },
}
})

const app = createApp(App)
app.use(router);
app.use(ElementPlus);
app.use(store)
app.use(ArgonDashboard);
app.mount('#app')
