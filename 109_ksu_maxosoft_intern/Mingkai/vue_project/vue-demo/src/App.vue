<template>
	<div id="app">
		<div class="row">
			<!-- <div class="col" v-for="(item, index) in user" :key="index">
				<child :data="item">
				</child> -->
          <child2 :data="data" option="option"> </child2>
	
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
        title: "A公司",
        labels: [],
        datasets: [
          {
            label: "Data One",
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            borderColor: "rgb(255, 99, 132)",
            data: [10, 20, 12, 39, 70, 40],
            borderWidth: 1,
          },
          {
            label: "Data One",
            backgroundColor: "rgba(153, 102, 255, 0.2)",
            borderColor: "rgb(153, 102, 255)",
            data: [60, 55, 32, 10, 2, 12, 53, 62, 25],
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
