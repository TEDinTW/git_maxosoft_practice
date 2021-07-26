<script>
import {Bar} from "vue3-chart-v2";

export default {
  name: "child",
  extends: Bar,
  props: ["data","option"],
  data(){
      return{

      }
  },
   mounted () {
    this.renderChart(this.data, this.options)
  }
}


</script>