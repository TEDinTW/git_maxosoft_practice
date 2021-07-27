<template>
<div class="row">
  <div class="col-xs-6 col-md-4">
  <div class="card border-dark">
    <div class="card-header">
      <p>{{ data.title }}</p>
    </div>
    <div class="card-body">
      <bar :data="data" :option="option"></bar>
      <p class="card-text">
        Some quick example text to build on the card title and make up the bulk of the
        card's content.
      </p>
      <button class="btn-primary">Read more</button>
    </div>
  </div>
  </div>
    <div class="col-xs-6 col-md-4">
  <div class="card border-dark">
    <div class="card-header">
      <p>{{ data.title }}</p>
    </div>
    <div class="card-body">
      <doughnut :data="data" :option="option"></doughnut>
      <p class="card-text">
        Some quick example text to build on the card title and make up the bulk of the
        card's content.
      </p>
      <button class="btn-primary">Read more</button>
    </div>
  </div>
  </div>
  </div>
</template>

<script>
import bar from "./bar.vue";
import doughnut from "./doughnut.vue";

export default {
  name: "child2",
  props: ["data", "option"],
  components: {
    bar,
    doughnut,
  },
};
</script>

<style>
.resume {
  width: 10%;
  margin: 1em;
}
p {
  text-align: center;
}
img {
  height: 50%;
  width: 50%;
}
</style>
