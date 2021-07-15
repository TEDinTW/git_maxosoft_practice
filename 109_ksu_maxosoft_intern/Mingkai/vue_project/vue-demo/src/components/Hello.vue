<template>
<div id="app">
  <h1 class="top">TO-DO:</h1>
  <div class="wrapper">
    <div class="controls">
      <input v-model="newTodo" @keyup.enter="addTodo" type="text" placeholder="New tasks go here..." autofocus>
      <button class="add" v-on:click="addTodo">Add</button>
      <button class="clear" v-on:click="clearTodos">Clear</button>
    </div>
    <ul>
      <todo-item v-for="(todo, index) in todos"
                 v-bind:title="todo.title"
                 v-bind:completed="todo.completed"
                 v-on:toggle="toggle(index)"
                 v-on:delete="deleteTodo(index)"></todo-item>
    </ul>
  </div>
</div>
</template>

<script>
Vue.component('todo-item', {
  props: ['title', 'completed'],
  template: `
<li>
  <button class="btn"
          v-bind:class="{ done: this.completed }"
          v-on:click="$emit('toggle')">O</button>
  <button class="btn"
          v-bind:class="{ delete: this.completed }"
          v-on:click="$emit('delete')">X</button>
  <span v-bind:class="{ completed: this.completed }">
    {{this.title}}
  </span>
</li>
`,
});

const app = new Vue({
  el: '#app',
  data: {
    newTodo: '',
    todos: [{ title: 'Just a todo', completed: true} ]
  },
  methods: {
    addTodo() {
      if (!this.newTodo.trim()) return;
      this.todos.push({ title: this.newTodo, completed: false });
      this.newTodo = '';
    },
    
    toggle(index) {
      this.todos[index].completed = !this.todos[index].completed;
    },
    
    deleteTodo(index) {
      this.todos.splice(index, 1);
    },

    clearTodos() {
      if (this.todos.length < 1) return;
      if (confirm('Want to clear all todos?')) {
        this.todos = [];
      }
    }
  }
});
</script>