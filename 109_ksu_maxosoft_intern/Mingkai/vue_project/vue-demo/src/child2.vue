<template>
  <div class="card border-dark">
    <div class="card-header">
      <p>{{ data.title}}</p>
    </div>
    <div class="card-body">
      <bar :data="data" :option="option"></bar>
    </div>
  </div>
</template>

<script>
import bar from "./bar.vue";

export default {
  name: "child2",
  props: ["data", "option"],
  components: {
    bar,
  },
};
</script>

<style>
.resume {
  width: 10%;
  margin: 1em;
}
p {
  text-align: left;
}
img {
  height: 50%;
  width: 50%;
}
</style>
