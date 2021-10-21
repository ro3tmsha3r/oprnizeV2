import Vue from 'vue';
import App from './views/App';
import router from './router';
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(Element,{size: 'small', zIndex: 3000 })

new Vue({
  el: '#app',
  router,
  render: h => h(App),
});

