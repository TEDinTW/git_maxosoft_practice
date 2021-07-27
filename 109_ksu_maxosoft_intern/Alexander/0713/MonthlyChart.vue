<script>
import { defineComponent } from 'vue'
import {Bar} from 'vue3-chart-v2'

export default defineComponent({
  name: 'MonthlyChart',
  extends: Bar,
  mounted () {
    // Overwriting base render method with actual data.
    this.renderChart({
      labels: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
      datasets: [
        {
          label: '甲班',
          backgroundColor: '#f87979',
          data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
        },
         {
          label: '乙班 ',
          backgroundColor: 'blue',
          data: [20, 25, 9, 23, 15, 25, 24, 38, 16, 56, 32, 19]
        },
        {
          label: '丙班 ',
          backgroundColor: 'green',
          data: [4, 23, 56, 41, 17, 35, 25, 41, 2, 36, 45, 9]
        }
      ]
    })
  }
})
</script>