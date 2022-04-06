import Vue from 'vue'
import VueRouter from 'vue-router'
import HomePage from './components/pages/HomePage.vue'
import ContactPage from './components/pages/ContactPage.vue'
import PageDetail from './components/pages/PageDetail.vue'
import NotFoundPage from './components/pages/NotFoundPage.vue'


Vue.use(VueRouter)

const router = new VueRouter({
    mode:'history',
    linkExactActiveClass:'active',
    routes: [
        {path:'/', component: HomePage},
        {path:'/contacts', component: ContactPage},
        {path:'/posts/:id', component: PageDetail,name:'post-detail'},
        {path:'*', component: NotFoundPage},        
    ]
});
export default router;
