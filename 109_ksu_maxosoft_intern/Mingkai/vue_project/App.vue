<template>
  <!-- <HelloWorld msg="Welcome to Your Vue.js App"/> -->
  <!-- <Hello /> -->
  <components/>
  <Child/>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'
// import Hello from './components/Hello.vue'
import components from './components/components.vue'
import child from './components/child.vue'


import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';




export default {
  components: {
    components,
    child
    // HelloWorld
    // Hello
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
