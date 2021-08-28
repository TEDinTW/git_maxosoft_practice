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
        <label>{{ index }},{{ item.id }},{{ item.weight }}</label>
        <!-- <div v-for="(item, index) in info" :key="item" class="faq-question"> -->
        <!-- <td>{{ index }},{{ item.id }},{{ item.weight }}</td> -->
      </div>
    </div>
    <br />
    <br />
    <span> 選擇資料加入區域:</span>
    <select @change="onChange($event)">
      <option selected>請選擇</option>
      <option value="input">Input</option>
      <option value="output">Output</option>
      <option value="no">不良品</option>
    </select>
    <br />
    <div>{{ answer }}</div>
    <div v-for="item in answer" :key="item">
      <td>{{ item.id }},{{ item.weight }}</td>
    </div>
    <br />
    <div class="card border-dark" id="left">
      <div class="card-header">
        <h3>Input</h3>
      </div>
      <div class="card-body">
        <h5>Total: {{ total_input }}</h5>
        <p class="card-text"></p>
        <div class="faq-body-input">
          <div v-for="answer in input" v-bind:key="answer">
            <!-- <label>{{ answer}}{{answer.id}}</label> -->
            <div v-for="item in answer" :key="item" class="faq-question-input">
              <label>{{ item.id }},{{ item.weight }}</label>
              <button
                type="button"
                class="close ml-auto"
                @click="deleteTodo1(index)"
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
        <h5>Total: {{ total_output }}</h5>
        <p class="card-text"></p>
        <div class="faq-body-output">
          <div v-for="answer in output" v-bind:key="answer">
            <!-- <label>{{ answer}}{{answer.id}}</label> -->
            <div v-for="item in answer" :key="item" class="faq-question-output">
              <label>{{ item.id }},{{ item.weight }}</label>
              <button
                type="button"
                class="close ml-auto"
                @click="deleteTodo2(index)"
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

    <div class="card border-dark" id="right-down">
      <div class="card-header">
        <h2>不良品</h2>
      </div>
      <div class="card-body">
        <h5>Total: {{ total_no }}</h5>
        <p class="card-text"></p>
        <div class="faq-body-no">
          <div v-for="answer in no" v-bind:key="answer">
            <!-- <label>{{ answer}}{{answer.id}}</label> -->
            <div v-for="item in answer" :key="item" class="faq-question-no">
              <label>{{ item.id }},{{ item.weight }}</label>
              <button
                type="button"
                class="close ml-auto"
                @click="deleteTodo3(index)"
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
    <h2>Lose:</h2>
    <h2>得利:</h2>
    {{ output }}
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
      input: [],
      output: [],
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
    total_input: function () {
      return _.reduce(
        this.answer,
        function (total, item) {
          return total + item.weight;
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
    total_output: function () {
            return _.reduce(
        this.output,
        function (total, item) {
          return total + item.weight;
        },
        0
      );
    },
    total_no: function () {
      return _.reduce(
        this.answer,
        function (total, proxy) {
          return total + proxy.weight;
        },
        0
      );
    },
  
  },
  methods: {
    deleteTodo1(index) {
      //刪除不需要的list
      this.answer.splice(index, 1);
    },
    deleteTodo2(index) {
      //刪除不需要的list
      this.answer.splice(index, 1);
    },
    deleteTodo3(index) {
      //刪除不需要的list
      this.answer.splice(index, 1);
    },
    onChange: function (e) {

      if (e.target.value == "input") {
        this.input.push(this.answer);
        console.log(this.answer)
      } else if (e.target.value == "output") this.output.push(this.answer);
      else if (e.target.value == "no") this.no.push(this.answer);
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
  height: 210px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}
.faq-question-output {
  padding: 10px;
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
  height: 210px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}
.faq-question-no {
  padding: 10px;
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
#x {
  top: 70px;
}
</style>
