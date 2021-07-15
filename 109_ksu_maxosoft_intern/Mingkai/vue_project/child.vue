<template>
  <div>
    子組件:
        <span>{{inputName}}</span>
    <!-- <span>{{ childValue }}</span> -->
    <!-- <input type="button" value="上傳" @click="childClick" /> -->
  </div>
</template>
<script>
export default {
   props: {
          inputName: String
   }
  // data() {
    // return {
      // childValue: "子組件",
    // };
  // },
  // methods: {
    // childClick() {
      // this.$emit("childByValue", this.childValue);
    // }
  // }
}
</script>
