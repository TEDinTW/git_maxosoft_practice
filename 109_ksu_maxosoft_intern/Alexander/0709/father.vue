<template>
<div>
<input type="text"   v-model="text">請輸入帳號
<child :name='text'></child>

<div id="class">
   
   
 </div>
</div>

</template>

<script>
import child from './son.vue'
export default{
    components:{
child
    },
    data(){
        return{
        text:"",
            
      
        }
    }
}
</script>