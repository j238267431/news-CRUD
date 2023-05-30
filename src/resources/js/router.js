import { createRouter, createWebHistory } from 'vue-router';
import login from './pages/login.vue';
import news from './pages/news.vue';
import registration from './pages/registration.vue';
import createNews from './pages/createNews.vue';
import update from './pages/update.vue';;
import welcome from './Welcome.vue'

const routes = [
   {
      path : '/news',
      name : 'news',
      component : news,
   },
   {
      path : '/registration',
      name : 'registration',
      component : registration,
   },
   {
      path : '/login',
      name : 'login',
      component : login,
   },
   {
      path : '/create',
      name : 'create',
      component : createNews,
   },
   {
      path : '/update',
      name : 'update',
      component : update,
      props: true,
   },
   {
      path : '/checkauth',
      name : 'checkauth'
   },

]

const router = createRouter({
   history: createWebHistory(),
   routes
})

router.beforeEach((to, from, next) => {
   console.log(to);
   next();
})

export default router;