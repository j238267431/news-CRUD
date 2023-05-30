// import "./bootstrap";
import { createApp } from "vue";
import Welcome from "./Welcome.vue";
import router from './router.js';

createApp(Welcome).use(router).mount("#app");