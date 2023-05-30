


<template>
  <div>
    <router-link :to="{name: 'news'}">News</router-link> | 
    <router-link v-if="!token" :to="{name: 'login'}">Login</router-link> <span v-if="!token">| </span> 
    <router-link v-if="!token" :to="{name: 'registration'}">Registration</router-link> <br><br>
    <span v-if="token" style="color: blue; font-size:24px;"><router-link  :to="{name: 'create'}">create new</router-link></span>
     <br><br>
    <router-view></router-view>
  </div>
</template>

<script>
import axios from 'axios';
export default {
   data() {
    return {
      token: ''
    }
  }, 
  methods: {
    getAccessToken(){
      console.log('this.before.after', this.token)
      this.token = localStorage.token;
      console.log('this.token.after', this.token)
    }
  },

  mounted(){
    this.getAccessToken()
  }
}
</script>

<style>

</style>