<template>
  <div v-bind:class="{ invisible: isInvisible }">
    <h1>Создание новости</h1> <br>
    <input v-model="title" type="title" placeholder="title"/> <br><br>
    <input v-model="body" type="body" placeholder="body"/><br><br>
    <input @click.prevent="store" type="submit"/>
  </div>
</template>

<script>
import axios from 'axios';
export default {

  
  data() {
    return {
      title: '',
      body: '',
      token: '',
      isInvisible: true,
    }
  }, 
  methods: {
    store() {
      console.log('test');
      
      axios
      .post('/api/store', {
        title: this.title,
        body: this.body,
      },
      {
        headers: {
            'authorization': `Bearer ${localStorage.token}`
         }
      }
      )
      .then(response => {
        //  this.token = response.data.access_token;
        //  localStorage.token = response.data.access_token;
        this.$router.push({ name: 'news', params:{message: 'news successfully added'} })
         console.log(localStorage.token);
      })
      .catch(error => {
        console.log(error);
        this.errored = true;
      });
    },
       checkAuth(){
    axios
      .post('/api/checkauth/', {

      },
      {
        headers: {
            'authorization': `Bearer ${localStorage.token}`
         }
      }
      )
      .then(response => {
        //  this.token = response.data.access_token;
        //  localStorage.token = response.data.access_token;
        this.isInvisible = false;
       
         console.log('checkAuth', response);
      })
      .catch(error => {
        this.$router.push({ name: 'news', params:{message: 'unauthorized'} })
        console.log(error);
        this.errored = true;
      });
    },
  },
  mounted(){
    this.checkAuth()
    this.token = localStorage.token;
  }
}
</script>

<style>

</style>