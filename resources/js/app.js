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