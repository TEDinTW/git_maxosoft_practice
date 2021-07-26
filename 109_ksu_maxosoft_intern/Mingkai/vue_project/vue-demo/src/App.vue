<template>
  <div id="app">
    <div class="row">
      <!-- <div class="col" v-for="(item, index) in user" :key="index"> -->
      <child2 :data="data" option="option"> </child2>
      <!-- </div> -->
    </div>
  </div>
</template>

<script>
import child2 from "./components/child2.vue";
export default {
  name: "App",
  components: {
    child2,
  },
  data() {
    return {
      data: {
        title: "公司1",
        labels: ["January", "February"],
        datasets: [
          {
            label: "Data One",
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            borderColor: "rgb(255, 99, 132)",
            data: [560, 20],
            borderWidth: 1,
          },
        ],
      },
      option: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    };
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  padding: 1em;
}
</style>
