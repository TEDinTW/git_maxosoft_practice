<template>
 
      <div class="card border-dark" id="left">
        <div class="card-header">
          <h3>Input</h3>
        </div>
        <div class="card-body">
          <p class="card-text">
              <div class="faq-body-input">
                  <div id="app">
                      
</div>
    <div class="faq-body-input">
    <div v-for="(item,index) in answer" :key="item" class="faq-question-input" >
    <input type="checkbox" :value="item" :label="index"/>
        <label>{{ item.id }}&{{ item.weight }}</label>
      <!-- {{answer}} -->
      </div>
    </div>
</div>

          </p>
        </div>
      </div>
    

      <div class="card border-dark" id="right-up">
        <div class="card-header">
          <h2>Output</h2>
        </div>
        <div class="card-body">
          <p class="card-text">
              <div class="faq-body-output">
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
    <div class="faq-question-output">
      Question
    </div>
  </div>
          </p>
        </div>
      </div>
    
      <div class="card border-dark" id="right-down">
        <div class="card-header">
          <h2>不良品</h2>
        </div>
        <div class="card-body">
          <p class="card-text">
              <div class="faq-body-no">
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
    <div class="faq-question-no">
      Question
    </div>
  </div>
          </p>
        </div>
      </div>
</template>

<script>
export default {
    name: 'card',
    props: [
        'answer'
    ]
}
</script>
<style>
#left{
  width: 400px;
  height: 700px;
float: left;
}
#right-up{
  width: 400px;
  height: 350px;
}
#right-down{
  width: 400px;
  height: 350px;
}
.faq-body-input {
  width: 370px;
  height: 560px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}

.faq-body::-webkit-scrollbar {
  width: 16px;
}
.faq-body ::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body ::-webkit-scrollbar-track {
  position: absolute;
  right: -3rem;
  top: -50rem;
  background: transparent;
}

.faq-question-input {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 1rem;
}
.faq-body-input::-webkit-scrollbar {
  width: 16px;
}
.faq-body-input::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body-output {
  width: 370px;
  height: 230px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}
.faq-question-output {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 0.8rem;
}
.faq-body-output::-webkit-scrollbar {
  width: 16px;
}
.faq-body-output::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
.faq-body-no {
  width: 370px;
  height: 230px;
  background: #fff;
  overflow: scroll;
  border: 1px solid #7b7d7f;
}
.faq-question-no {
  padding: 20px;
  border-bottom: 1px solid #000;
  line-height: 1.3;
  color: #15191b;
  font-size: 0.8rem;
}
.faq-body-no::-webkit-scrollbar {
  width: 16px;
}
.faq-body-no::-webkit-scrollbar-thumb {
  background-color: #7b7d7f;
  border: 5px solid #fff;
  border-radius: 10rem;
}
</style>