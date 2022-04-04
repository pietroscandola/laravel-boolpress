<template>
    <div>
        <header>
             <Header :title="title"/>
        </header>       
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
            title:"Boolpress",
        }
    }
}
</script>
