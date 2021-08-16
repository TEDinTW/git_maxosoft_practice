<template>
  <div id="app">
    <section v-if="errored">
      <p>axios 訪問 API似乎發生錯誤!!!!</p>
    </section>

    <div v-if="loading">Loading...</div>
    <!-- <selected></selected> -->

    <h1>Demo</h1>
    <div class="faq-body">
      <div v-for="(item, index) in info" :key="item" class="faq-question">
        <input type="checkbox" v-model="answer" :value="item" :label="index" />
        <label>{{ index }} :{{ item.id }}&{{ item.weight }}</label>

        <!-- <input type="checkbox" id="checkbox" v-model="answer"> {{index}}-{{item.id}}:{{item.weight}} -->
      </div>
    </div>
    <br />
    <select v-model="selected">
      <option selected value="true">Input</option>
      <option value="true">Output</option>
      <option value="true">不良品</option>
      <div v-if="selected == 'true'">{{ answer }}</div>
    </select>
    <span> 選擇資料加入區域:{{ selected }}</span>
    <br />
    <br />
    <div>{{ answer }}</div>
    <br />
    <card :answer="answer"></card>
    <h2>Total: <span class="price-content">{{ total_price }}</span></h2>
    <h2>Lose:</h2>
    <h2>得利:</h2>
  </div>
</template>

<script>
import _ from "lodash";
import axios from "axios";
import card from "./components/card.vue";
// import selected from "./components/select.vue";
// import VueScrollShadow from 'vue3-scroll-shadow'
export default {
  components: { card },
  name: "app",
  data() {
    return {
      loading: true,
      info: [],
      errored: false,
      selected: false,
      answer: []
    };
  },
  mounted() {
    this.loading = true;
    axios
      .get("https://yjserp.maxosoft.com/api/final_demo")
      .then((response) => (this.info = response.data.products))
      .then((data) => console.log(data))
      .catch((error) => {
        console.log(error);
        this.errored = true;
      }) //提醒使用者axios 訪問 API有錯誤
      .finally(() => (this.loading = false)); //載入loading
  },
  computed: {
    //計算選擇的item的weight sum
    total_price: function () {
      return _.reduce(
        this.answer,
        function (memo, item) {
          return memo + item.weight;
        },
        0
      );
    },
  },
};
</script>
<style>
.faq-body {
  width: auto;
  height: 400px;
  background: #fff;
  overflow: scroll;
  border: 5px solid #8f4586;
  border-radius: 10px;
}
.faq-body::-webkit-scrollbar {
  width: 20px;
}
.faq-body::-webkit-scrollbar-thumb {
  background-color: #8f4586;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body::-webkit-scrollbar-track {
  position: absolute;
  right: -3rem;
  top: -50rem;
  background: transparent;
}
.faq-question {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 1.3rem;
}
</style>
