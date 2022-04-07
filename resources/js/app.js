const { default: Echo } = require('laravel-echo');





require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('live-map', require('./components/Map.vue').default);

const app = new Vue({
    el: '#app',
    mounted() {
        window.Echo.channel('new-event')
            .listen('.event.created', (e) => {
                $("#currentReports").DataTable({
                    retrieve: true,
                }).ajax.reload();
            }),
            window.Echo.channel(`updated-event`)
            .listen('.event.updated', (e) => {
                $("#currentReports").DataTable({
                    retrieve: true,
                }).ajax.reload()
            })
    }
});

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyAcn-lnWsUHf2TwU1EeCV9SbRrDYcI7Suc",
    authDomain: "emergencyp.firebaseapp.com",
    projectId: "emergencyp",
    storageBucket: "emergencyp.appspot.com",
    messagingSenderId: "906523791830",
    appId: "1:906523791830:web:b9ce02dec9bbfe87b39477",
    measurementId: "G-026R2F3HN3"
};

// Initialize Firebase
const appf = initializeApp(firebaseConfig);