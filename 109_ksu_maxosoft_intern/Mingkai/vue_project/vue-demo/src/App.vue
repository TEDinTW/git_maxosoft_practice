<template>
      <h1>chart.js</h1>
  <div class="container">
    <div class="row">
      <div class="card" style="width: 18rem">
        <h5 class="card-title" align="center" valign="center">A公司Bar</h5>
        <div class="col" style="height: 300px; width: 300px"><MonthlyChart /></div>
        <div class="card-body">
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p>
          <button class="btn-primary" >Read more</button>
        </div>
      </div>
      <div class="card" style="width: 18rem">
        <h5 class="card-title" align="center" valign="center">A公司Doughnut</h5>
        <div class="col" style="height: 300px; width: 300px"><doughnut /></div>
        <div class="card-body">
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p>
          <button class="btn-primary" >Read more</button>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import { defineComponent } from "vue";
import MonthlyChart from "./components/chart.vue";
import doughnut from "./components/chartdoughnut.vue";


export default defineComponent({
  name: "App",
  components: {
    MonthlyChart,
    doughnut
  }
})
</script>


<style>
.h1{
  font:center
}
</style>
