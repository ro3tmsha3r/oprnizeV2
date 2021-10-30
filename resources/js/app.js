import { createApp } from 'vue'
import router from "./router";
import App from './views/App'
import ArgonDashboard from "./plugins/argon-dashboard";
import ElementPlus from 'element-plus'
import 'element-plus/lib/theme-chalk/index.css'
import jQuery from 'jquery'

import VueFormWizard from '@anivive/vue3-form-wizard'


import { createStore } from 'vuex'

// window.jQuery = jQuery
let $ = jQuery

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
app.use(VueFormWizard);
app.use(store)
app.use(jQuery)
app.use(ArgonDashboard);
app.mount('#app')
