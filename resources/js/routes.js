import Vue from 'vue'
import VueRouter from 'vue-router'
import HomePage from './components/pages/HomePage.vue'
import ContactPage from './components/pages/ContactPage.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    made:'history',
    routes: [
        {path:'/', component:HomePage},
        {path:'/contacts', component:ContactPage},
    ]
});

export default router;
