<template>
  <div id="app">
    
    <father></father>
  <son></son>
   
     </div>
</template>

<script>
import father from './components/father.vue'
import son from './components/son.vue'

export default {
  name: 'App',
  components: {
     father,
     son
  },
  data(){
    return{
   }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
