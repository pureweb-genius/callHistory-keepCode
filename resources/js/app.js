

import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import CallsList from './components/CallsList.vue';
import Statistics from "./components/Statistics.vue";
import PhoneMask from "./components/PhoneMask.vue";
app.component('example-component', ExampleComponent);
app.component('calls-list', CallsList);
app.component('phone-mask',PhoneMask);
app.component('statistics',Statistics);
app.mount('#app');
