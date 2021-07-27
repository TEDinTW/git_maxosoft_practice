<template>
  <div id="app">
    
    <todo-app></todo-app> 
     <model></model> 
     <HomeComponent></HomeComponent>
     </div>
</template>

<script>
 import TodoApp from './components/TodoApp.vue'
import  HomeComponent from './components/Home.vue'
import  model from './components/model.vue'

export default {
  name: 'App',
  components: {
     TodoApp,
     HomeComponent,
      model
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


