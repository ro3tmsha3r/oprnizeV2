import Vue from 'vue';
import App from './views/App';
import router from './router';
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';
import axios from 'axios'

Vue.use(axios)
// axios.defaults.baseURL = `${process.env.MIX_BASE_API}`

Vue.use(Element,{size: 'small', zIndex: 3000 })

new Vue({
  el: '#app',
  router,
  render: h => h(App),
});

