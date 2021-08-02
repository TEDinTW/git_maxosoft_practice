<template>
    <div id="PdfPage2">
        <div class="no-print">
            <button type="button" class="btn btn-primary" @click="pdfBtn">匯出PDF</button>
        </div>
        <div id="pdfDom" style="padding:10px;background-color:#fff;">
            <img alt="Vue logo" src="@/assets/logo.png">
            <h1>Welcome to Your Vue.js App</h1>
            <p v-for="(item,index) in 6" :key="index">{{item}}Welcome to Your Vue.js App</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PdfPage2",
        methods:{
            pdfBtn(){
                window.print();
            }
        }
    }
</script>

<style scoped>
/*儲存時的樣式*/
/*
瞭解更多可 百度CSS print樣式
*/
@media print{
    .no-print{
        display: none;
    }
}
/*列印頁配置*/
@page{
    margin:60px 10px;
}
</style>