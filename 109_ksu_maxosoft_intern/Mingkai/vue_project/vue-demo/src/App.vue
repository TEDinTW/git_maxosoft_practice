<template>
  <section v-if="errored">
    <p>
      axios 訪問 API似乎發生錯誤!!!!
    </p>
  </section>

  <div v-if="loading">Loading...</div>

  <div id="app" class="container">
    <div>
      {{ info }}
    </div>

    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">code</th>
            <th scope="col">rate_float</th>
            <th scope="col">description</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="dollars in info" v-bind:key="dollars">
            <td>{{ dollars.code }}</td>
            <td>{{ dollars.rate_float }}</td>
            <td>{{ dollars.description }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
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
      .get("https://api.coindesk.com/v1/bpi/currentprice.json")
      .then((response) => (this.info = response.data.bpi))
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })//提醒使用者axios 訪問 API有錯誤
      .finally(() => (this.loading = false)); //載入loading
  },
};
</script>
