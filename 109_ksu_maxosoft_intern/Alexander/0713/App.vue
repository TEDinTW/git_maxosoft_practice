<template>
  <MonthlyChart />
</template>

<script>
import { defineComponent } from 'vue'
import MonthlyChart from './components/MonthlyChart.vue'

export default defineComponent({
  name: 'App',
  components: {
    MonthlyChart
  }
})
</script>