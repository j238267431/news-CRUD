<template>
  <!-- <h1>news</h1> -->
  <div style="text-transform: uppercase; color: red;">{{ message }}</div>
  
  <div>
    <table style="margin-top: 20px;">
      <tbody>
        <tr>
          <th>Заголовок</th>
          <th>Описание</th>
        </tr>
        <tr v-for="item in news" :key="item.id">
          <td>{{ item.title }}</td>
          <td>{{ item.body }}</td>
          <td style="color:green; cursor:pointer;"><router-link :to="{
              name: 'update',
              params: {
                      id: item.id,
                      title: item.title,
                      body: item.body,
                  }
            }">update</router-link></td> | 
          <td style="color:red; cursor:pointer;" @click="event => remove(item.id)">delete</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>  
import axios from 'axios';
export default {
  data() {
    return {
      news:[],
      api: '',
      message: this.$route.params.message
    }
  }, 
  methods: {
    getNews(){
      axios
      .get('/api/news', {
        //  headers: {
        //     'authorization': `Bearer ${localStorage.token}`
        //  }
      })
      .then(response => {
         console.log(response);
         this.news = response.data;
         console.log('this.news', this.news);
         
      })
      .catch(error => {
        
        console.log(error);
        this.errored = true;
      });
    },
    update(id){
      this.api
      .get('/api/update/'+id, {
        //  headers: {
        //     'authorization': `Bearer ${localStorage.token}`
        //  }
      })
      .then(response => {
         this.getNews()
      })
      .catch(error => {
        console.log(error);
        this.errored = true;
      });
    },
    remove(id){
      axios
      .delete('/api/destroy/'+id, {
        _method:"DELETE",
         headers: {
            'authorization': `Bearer ${localStorage.token}`
         }
      })
      .then(response => {
         this.getNews()
      })
      .catch(error => {
        this.message = 'unauthorized'
        console.log(error);
        this.errored = true;
      });
    },
    initApi(){
      const api = axios.create();
      api.interceptors.request.use(
        config => {
          if(localStorage.token){
            config.headers = {
            'authorization': `Bearer ${localStorage.token}`
          }
          return config;
          }

        }, 
        error => {

        })

        api.interceptors.response.use(
          config => {
            if(localStorage.token){
              config.headers = {
                'authorization': `Bearer ${localStorage.token}`
              }
              return config;
            }
          }, 
          error => {
            
          })
        this.api = api;
    }
  },
  mounted() {
    this.initApi();
    this.getNews();
  }

}
</script>

<style>

</style>