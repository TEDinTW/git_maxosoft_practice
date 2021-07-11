<template> <!--todolist-->
  <div id="app" class="container-fluid text-center">
    <h1 class="text-info">{{ title }}</h1>
    <p>{{ msg }}</p>

    <div class="col">
      <div v-if="error" class="alert alert-danger" @click="error = !error">
        <strong>Error:</strong> Please add the task name first!
      </div>
      <form @submit.prevent="addTask">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Task Name" v-model="taskName">
          <div class="input-group-append">
            <button  class="btn btn-warning" type="submit">送出</button>
          </div>
        </div>
      </form>


      <ul class="list-group">
        <li v-for="(task_name,index) in tasks" :key="index" class="list-group-item">
          <div class="row">
            <div class="col-2">
              <!--input type="checkbox" :checked="task_name['check']" @change="changeCheck" :id="task_name['index']" class="form-control"-->
            </div>
            <div class="col-12" @click="loadData(index)">{{ task_name['task'] }}
               <button @click="editTodo(index)" class="btn btn-outline-primary border-0 ml-2">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
               </button>

               <button @click="deleteTodo(index)" class="btn btn-danger">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>     

               </button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import  Hello from './components/HelloWorld.vue'

export default { 
  name: 'app',
  data () {
    return {
      title: 'VueDo List',
      msg: 'Welcome to Your First ToDo List App with Vue.js',
      taskName: "",
      tasks: [
        {"index": 0, "task": 'Download VueJS', "check": false},
        {"index": 1, "task": 'Install Node Modules', "check": false},
        {"index": 2, "task": 'Run NodeJS Server', "check": false},
        {"index": 3, "task": 'Open App', "check": false},
        {"index": 4, "task": 'Add Task', "check": false},
        {"index": 5, "task": 'Update Task', "check": false},
        {"index": 6, "task": 'Delete Task', "check": false}
      ],
      error: false,
      update: true,
      updateIndex: null,
      ids: [],
      deleteMultiple: false
    }
  },
  updated: function(){
    console.log("UPDATED----");
    this.tasks.forEach((task) => {
      console.log(task.task,  "--", task.check);
    });
    console.log("----");
  },
  methods: {
    deleteMulti: function(e){ // eslint-disable-line no-unused-vars
      this.tasks.forEach((task) => {
        console.log(task.task, task.check);
      });
      console.log("----");
      var ids = [];
      this.tasks.forEach((task) => {
        if(task.check == true){
          ids.push(task.index)
        }
      });
      ids.forEach(id => {
        this.tasks = this.tasks.filter(function(task) {
          return task['index'] != id;
        });
      });
      this.deleteMultiple = false;
      this.tasks.forEach((task) => {
        console.log("DELETE:", task.task, task.check);
      });
    },
    changeCheck: function(e){
      this.tasks[e.target.id]['check'] = e.target.checked
      var count = 0
      this.tasks.forEach((task) => {
        if(task.check == true){
          count = count + 1
        }
      })
      this.deleteMultiple = (count > 0) ? true : false
      console.log("changeCheck");
      this.tasks.forEach((task) => {
        console.log(task.task, task.check);
      });
    },
    loadData: function(index){
      console.log(this.tasks)
      this.taskName = this.tasks[index]['task']
      this.updateIndex = index
      this.update=true
    },
    addTask () {
    if(this.update == true){
      this.update = false
      this.tasks[this.updateIndex]['task'] = this.taskName
    }else{
      this.tasks.push({
      id: this.index, // id 唯一且自增
      task: this.taskName// todo 標題
      })
    }
  // id 自增
  this.index++;
  // 清空輸入框
  this.taskName= ''
    },
    editTodo(index) {
      console.log("editTodo"+index)
    this.selectedIndex = index;
    this.selectedItem = JSON.parse(JSON.stringify(this.tasks[index]));
    this.editDialogVisible = true;
    },
    deleteTodo(index) {
    this.tasks.splice(index, 1);
    },
  }
}
</script>

<style lang="scss">

</style>
