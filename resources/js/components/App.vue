<template>
    <div class="container">
        <Header :title="title"/>
    </div>
</template>

<script>
import Header from './Header.vue'
export default {
    name:"App",
    components:{
        Header,
    },
    data(){
        return{
            title:"Work in Progress",
        }
    }
}
</script>
