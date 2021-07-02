<template>
  <h2 class="red">test...{{msg}}</h2>
  </template>

  <script>
  export default{
       name:'test',
       props:{
       msg:{
            type:String,
            default:"測試"
           }
       },
    methods:{

     },
     data(){
       return{

     }
   },
  }
 </script>
  <style>
    .red{color:#ff0000;}
  </style>
