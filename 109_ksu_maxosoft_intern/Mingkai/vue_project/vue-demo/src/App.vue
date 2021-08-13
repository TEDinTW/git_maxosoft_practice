<template>
  <section v-if="errored">
    <p>axios 訪問 API似乎發生錯誤!!!!</p>
  </section>

  <div v-if="loading">Loading...</div>
  <selected></selected>

  <div id="app" class="container">
    <div>
      {{ info }}
    </div>
  </div>
  <div id="app">
    <h1>Todos</h1>
    <ul>
      <li v-for="item of info" :key="item">
        {{ item[0] }} ,{{ item[0].id }},{{ item[0].weight }} {{ item[1] }},{{
          item[1].id
        }},{{ item[1].weight }}
      </li>
    </ul>
  </div>

  <card></card>
</template>

<script>
import axios from "axios";
import card from "./components/card.vue";
import selected from "./components/select.vue";

export default {
  components: { card, selected },
  name: "app",
  data() {
    return {
      loading: true,
      info: null,
      errored: false,
    };
  },
  mounted() {
    this.loading = true;
    axios
      .get("https://yjserp.maxosoft.com/api/final_demo")
      .then((response) => (this.info = response.data))
      .then((data) => console.log(data))
      .catch((error) => {
        console.log(error);
        this.errored = true;
      }) //提醒使用者axios 訪問 API有錯誤
      .finally(() => (this.loading = false)); //載入loading
  },
};
</script>
