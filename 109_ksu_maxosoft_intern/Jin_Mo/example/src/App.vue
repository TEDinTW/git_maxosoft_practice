<template>
	<div id="app">
		<div class="row">
			<div class="col" v-for="(item, index) in user" :key="index">
				<child :data="item">
				</child>
			</div>
		</div>
	</div>
</template>

<script>
import child from './components/child.vue';

export default {
  name: 'App',
  components: {
    child
  },
  data() {
    return {
		user : [
		{
			'name': '王小明',
			'phone': '0123456789',
			'address': '臺北市信義區',
			'msg': '我是王小明，我來自臺北'
		},
		{
			'name': '王小二',
			'phone': '1234567890',
			'address': '臺北市信義區',
			'msg': '我是王小二，我來自臺北'
		},
		{
			'name': '隔壁老王',
			'phone': '2345678901',
			'address': '臺北市信義區',
			'msg': '我是隔壁老王，我來自臺北'
		},
		{
			'name': '對面小王',
			'phone': '3456789012',
			'address': '臺北市信義區',
			'msg': '我是對面小王，我來自臺北'
		}
		]
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  padding: 1em;
}
</style>
