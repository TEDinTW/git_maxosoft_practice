<template>
  <div id="app">
    <section v-if="errored">
      <p>axios 訪問 API似乎發生錯誤!!!!</p>
    </section>

    <div v-if="loading">Loading...</div>
    <!-- <selected></selected> -->

    <h1>Demo</h1>
    <input type="text" v-model="filter" placeholder="請輸入id名稱:" />

    <div class="faq-body">
      <div v-for="(item, index) in filterByTerm" :key="item" class="faq-question">
        <input type="checkbox" v-model="answer" :value="item" :td="index" />
        <td>{{ index }},{{ item.id }},{{ item.weight }}</td>
        <!-- <div v-for="(item, index) in info" :key="item" class="faq-question"> -->
        <!-- <td>{{ index }},{{ item.id }},{{ item.weight }}</td> -->
      </div>
    </div>
    <br />
    <select v-model="selected" v-bind:id="answer">
      <option selected>Input</option>
      <option>Output</option>
      <option>不良品</option>
    </select>
    <span> 選擇資料加入區域:{{ selected }}</span>
    <br />
    <br />
    <div>{{ answer }}</div>
    <br />
    <div class="card border-dark" id="left">
      <div class="card-header">
        <h3>Input</h3>
      </div>
      <div class="card-body">
        <p class="card-text"></p>
        <div class="faq-body-input">
          <div id="app"></div>

          <div class="faq-body-input">
            <div
              v-for="(item, index) in answer"
              v-bind:key="item"
              class="faq-question-input"
            >
              <label>{{ item.id }}&{{ item.weight }}</label>
              <button
                type="button"
                class="close ml-auto"
                @click="deleteTodo(index)"
                aria-label="Close"
              >
              <!-- 刪除的button -->
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-dark" id="right-up">
      <div class="card-header">
        <h2>Output</h2>
      </div>
      <div class="card-body">
        <p class="card-text"></p>
        <div class="faq-body-output">
          <div v-for="item in answer" v-bind:key="item" class="faq-question-input">
            <label>{{ item.id }}&{{ item.weight }}</label>
            <div>{{ output }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-dark" id="right-down">
      <div class="card-header">
        <h2>不良品</h2>
      </div>
      <div class="card-body">
        <p class="card-text"></p>
        <div class="faq-body-no">
          <div v-for="item in answer" v-bind:key="item" class="faq-question-input">
            <label>{{ item.id }}&{{ item.weight }}</label>
            <div>{{ no }}</div>
          </div>
        </div>
      </div>
    </div>
    <h2>
      Total: <span class="price-content">{{ total_price }}</span>
    </h2>
    <h2>Lose:</h2>
    <h2>得利:</h2>
  </div>
</template>

<script>
import _ from "lodash";
import axios from "axios";
export default {
  name: "app",
  data() {
    return {
      loading: true,
      info: [],
      errored: false,
      selected: [],
      answer: [],
      output: [],
      input: [],
      no: [],
      filter: "",
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
    filterByTerm() {
      //filter search
      return this.info.filter((item) => {
        return item.id.toLowerCase().includes(this.filter);
      });
    },
  },
  methods: {
    deleteTodo(index) { //刪除不需要的list
    this.answer.splice(index, 1);
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
#left {
  width: 400px;
  height: 700px;
  float: left;
}
#right-up {
  width: 400px;
  height: 350px;
}
#right-down {
  width: 400px;
  height: 350px;
}
.faq-body-input {
  width: 370px;
  height: 560px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}

.faq-body::-webkit-scrollbar {
  width: 16px;
}
.faq-body ::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body ::-webkit-scrollbar-track {
  position: absolute;
  right: -3rem;
  top: -50rem;
  background: transparent;
}

.faq-question-input {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 1rem;
}
.faq-body-input::-webkit-scrollbar {
  width: 16px;
}
.faq-body-input::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body-output {
  width: 370px;
  height: 230px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}
.faq-question-output {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 0.8rem;
}
.faq-body-output::-webkit-scrollbar {
  width: 16px;
}
.faq-body-output::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body-no {
  width: 370px;
  height: 230px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}
.faq-question-no {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 0.8rem;
}
.faq-body-no::-webkit-scrollbar {
  width: 16px;
}
.faq-body-no::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
</style>
