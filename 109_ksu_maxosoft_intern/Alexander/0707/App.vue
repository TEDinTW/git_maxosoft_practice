<template>
  <div id="app">
    <HomeComponent></HomeComponent>
    <todo-app></todo-app>
    
     </div>
</template>

<script>
import TodoApp from './components/TodoApp.vue'
import  HomeComponent from './components/Home.vue'

export default {
  name: 'App',
  components: {
    TodoApp,
     HomeComponent
  },
  data(){
    return{
   }
  }
}
</script>



