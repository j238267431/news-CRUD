<template>
  <div>
    <h1>Регистрация</h1> <br>
    <input v-model="name" type="text" placeholder="name"/> <br><br>
    <input v-model="email" type="email" placeholder="email"/> <br><br>
    <input v-model="password" type="password" placeholder="password"/><br><br>
    <input v-model="password_confirmation" type="password" placeholder="repeat password"/><br><br>
    <input @click.prevent="register" type="submit"/>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    }
  }, 
  methods: {
    register() {
      console.log('test');
      axios
      .post('/api/auth/register', {
         name: this.name,
         email: this.email,
         password: this.password,
         password_confirmation: this.password_confirmation
      })
      .then(response => {
        console.log('response', response);
         localStorage.token = response.data.token;
         this.$router.push({name: 'welcome', params:{message: 'authorized'}});
         console.log(localStorage.token);
      })
      .catch(error => {
        console.log(error);
        this.errored = true;
      });
    },
  },
}
</script>

<style>

</style>