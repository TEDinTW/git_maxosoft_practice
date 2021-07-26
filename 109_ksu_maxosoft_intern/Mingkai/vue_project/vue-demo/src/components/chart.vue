<script>
import { defineComponent } from "vue";
import { Bar } from "vue3-chart-v2";

export default defineComponent({
  name: "MonthlyChart",
  extends: Bar,
  mounted() {
    // Overwriting base render method with actual data.
    this.renderChart({
      labels: [],
      datasets: [
        {
          label: "Data 1",
          backgroundColor: "#f87979",
          width: 500,
          data: [40, 20, 12, 39, 70, 40],
        },
        {
          label: "Data 2",
          backgroundColor: "#05CBE1",
          data: [60, 55, 32, 10, 2, 12, 53, 62, 25],
        },
      ],
      mounted() {
        this.renderChart(this.datasets);
      },
    });
  },
});
</script>
