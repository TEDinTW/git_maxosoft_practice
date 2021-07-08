<template>
<div>

<h1>{{model}}</h1>
<input type="text"   v-model="text">請輸入帳號
<div>{{text}}</div><br>
<div>{{tw}}</div>
<input type="number"  min="0"   v-model="twd">

<div id="class">
   
    {{message2 }} {{usa*twd}} <br>
       
       {{ message3 }}  {{hkd*twd}}<br> 
       {{ message4 }}  {{gbp*twd}}<br> 
       {{ message5 }}  {{aud*twd}}<br> 
       {{ message6 }}  {{jpy*twd}}<br> 
       {{ message7 }}  {{cny*twd}}
     
      </div>
</div>

</template>

<script>
export default{
    data(){
        return{
        model:"匯率↓",
        text:"",
          tw:'台幣',
          message2:'美金',
           message3:'港幣',
          message4:'英鎊',
          message5:'澳幣',
          message6:'日圓',
          message7:'人民幣',
          twd:'1',
        usa:'0.03',
          hkd:'0.29',
          gbp:'0.02',
          aud:'0.04',
          jpy:'5',
          cny:'0.23',      
      
        }
    }
}
</script>