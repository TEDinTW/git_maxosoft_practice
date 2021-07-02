<template>
  <div class="ToDoList">
  <div>
  <input type="text" v-model="newItem">
  <button @click="addNewItem">添加</button>
</div>
    <h1 v-html="title"></h1>
    <ul>
      <li
      v-for="item in items"
      :key="item.id">
        <!-- 待办事项 -->
        <span v-text="item.title"></span>
        <!-- 完成按钮 -->
        <button v-on:click="toggleFinish(item)">完成</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'ToDoList',
  data () {
    return {
      title: 'ToDoList', //标题名称
      //待办事项列表
      items: [
        {
          id: 1,
          title: '吃饭'
        },
        {
          id: 2,
          title: '睡觉'
        },
        {
          id: 3,
          title: '打豆豆'
        }]
    }
  },
  methods: {
// 点击完成按钮，删除对应事项
  toggleFinish (recycleitem) {
    // 使用map遍历
    this.items.map((item, index) => {
      if (item.id === recycleitem.id) {
        // 删除对应事项
       this.items.splice(index, 1)
      }
    })
  },
  addNewItem () {
  // 使用push为数组添加新元素
  this.items.push({
    id: this.id, // id 唯一且自增
    title: this.newItem // todo 标题
  })
  // id 自增
  this.id++;
  // 清空输入框
  this.newItem = ''
      }
    }
  }


</script>