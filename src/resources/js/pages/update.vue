<template>
  <div v-bind:class="{ invisible: isInvisible }">
    <h1>Редактирование новости</h1> <br>
    <input v-model="title" type="text" name="title" placeholder="title"  /> <br><br>
    <input v-model="body" type="text" name="body" placeholder="body"/><br><br>
    <input @click.prevent="update($route.params.id)" type="submit"/>

  </div>
</template>

<script>
import axios from 'axios';
export default {

  
  data() {
    return {
      title: this.$route.params.title,
      body: this.$route.params.body,
      token: '',
      isInvisible: true,
    }
  }, 
  methods: {
    update(id) {
      console.log('test');
      axios
      .post('/api/update/'+id, {
        title: this.title,
        body: this.body,
        _method:'PUT',
        
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
        this.$router.push({ name: 'news', params:{message: 'news successfully updated'} })
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
  }
}
</script>

<style>
  .invisible{
    display: none;
  }
</style>