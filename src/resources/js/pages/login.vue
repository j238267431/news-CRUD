<template>
  <div>
    <h1>Вход</h1> <br>
    <input v-model="email" type="email" placeholder="email"/> <br><br>
    <input v-model="password" type="password" placeholder="password"/><br><br>
    <input @click.prevent="login" type="submit"/>

  </div>
</template>

<script>
import axios from 'axios';
export default {

  
  data() {
    return {
      email: '',
      password: '',
    }
  }, 
  methods: {
    login() {
      console.log('test');
      
      axios
      .post('/api/auth/login', {
         email: this.email,
         password: this.password,
      })
      .then(response => {
         this.token = response.data.access_token;
         localStorage.token = response.data.access_token;
         console.log(localStorage.token);
         this.$router.push({name: 'news'})
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