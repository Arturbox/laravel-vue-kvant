<template>
  <div class="feedback-section">
    <form action="" @submit.stop.prevent method="POST" class="contact-form main-form">
      <h3>Form</h3>
      <div class="form-group">
        <label for="name" class="form-label">Name<span class="required-symbol">*</span></label>
        <div class="input-group">
          <input type="text" id="name" class="form-input" v-model="feedback_info.name"/>
          <p v-if="errors.name" v-html="errors.name" class="error-message"></p>
        </div>
      </div>
      <div class="form-group">
        <label for="info" class="form-label">Phone<span class="required-symbol">*</span></label>
        <div class="input-group">
          <input type="text" id="info" class="form-input" v-model="feedback_info.phone"/>
          <p v-if="errors.phone" v-html="errors.phone" class="error-message"></p>
        </div>
      </div>
      <div class="form-group">
        <label for="message" class="form-label">Message<span class="required-symbol">*</span></label>
        <div class="input-group">
          <textarea name="message" id="message" class="form-textarea" v-model="feedback_info.message"></textarea>
          <p v-if="errors.message" v-html="errors.message" class="error-message"></p>
        </div>
      </div>
      <button type="submit" @click="submit" class="main-btn base-btn submit-btn">Send</button>
    </form>
  </div>
</template>
<script setup>
import {ref} from "vue"
import axios from "axios";

const feedback_info = ref({
  name: null,
  phone: null,
  message: null
})

const errors = ref([])

function formValidation(form) {
  Object.keys(form).filter(item => {
    errors.value[item] = null
    if (form[item] !== null && form[item] !== '') {
      errors.value[item] = null
    } else {
      errors.value[item] = 'required'
    }
  })
}

function showResponseValidationErrors(list) {
  Object.keys(list).map(item => {
    errors.value[item] = list[item].join('<br>')
  })
}

function checkProperties(obj) {
  for (let i in obj) {
    if (obj[i] !== null && obj[i] !== "")
      return false;
  }
  return true;
}

async function submit() {
  let formContact = feedback_info.value
  await formValidation(formContact)
  if (checkProperties(errors.value)) {
    axios.post('http://localhost:82/api/statement', feedback_info.value).then((response) => {
      alert(response.data.message)
    }).catch(error => {
      if (error.response) {
        if (error.response.data.hasOwnProperty('errors')) {
          showResponseValidationErrors(error.response.data.errors)
        } else {
          alert(error.response.data.message)
        }
      } else if (error.request) {
        console.log(error.request);
      } else {
        console.log('Error', error.message);
      }
    });
    Object.keys(formContact).map(item => formContact[item] = '')
  }
}
</script>