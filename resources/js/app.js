

import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import CallsList from './components/CallsList.vue';
import InputMask from "./components/InputMask.vue";
import Statistics from "./components/Statistics.vue";
app.component('example-component', ExampleComponent);
app.component('calls-list', CallsList);
app.component('input-mask',InputMask);
app.component('statistics',Statistics)
app.mount('#app');
