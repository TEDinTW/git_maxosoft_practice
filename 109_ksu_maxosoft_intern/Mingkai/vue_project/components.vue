  <template>
  <div>
    父組件:
    <input type="text" v-model="name">
    <!-- <span>{{name}}</span> -->
    <br>
    <br>
      <child :inputName="name"></child>
      <child :inputName="name"></child>
      <child :inputName="name"></child>

    <!-- <child v-on:childByValue="childByValue"></child> -->
  </div>
</template>
<script>
  import child from './child.vue'
  export default {
    components: {
      child
    },
    data: function() {
      return {
        name: ''
      }
    // },
    // methods: {
      // childByValue: function (childValue) {
        // this.name = childValue
      // }
    }
  }
</script>
