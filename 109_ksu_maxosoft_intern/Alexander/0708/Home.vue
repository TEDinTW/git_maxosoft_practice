<template>
<div>
<h1>{{homeTitle}}</h1>

<p>{{count}}</p>
<button @click="count ++">加

</button>
<button @click="count --">減</button>
</div>
</template>

<script>
export default{
    data(){
        return{
         homeTitle:"請按這裡↓",
                
      count:0
        }
    }
}
</script>