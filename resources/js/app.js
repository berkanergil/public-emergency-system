const { default: Echo } = require('laravel-echo');

require('./bootstrap');

window.Vue = require('vue').default;

// Vue.component('event-status', require('./components/EventStatus.vue').default);
// Vue.component('event-table', require('./components/EventTable.vue').default);

const app = new Vue({
    el: '#app',
    mounted() {
        window.Echo.channel('new-event')
            .listen('.event.created', (e) => {
                $("#currentReports").DataTable({
                    retrieve: true,
                }).ajax.reload()
            }),
            window.Echo.channel(`updated-event`)
            .listen('.event.updated', (e) => {
                $("#currentReports").DataTable({
                    retrieve: true,
                }).ajax.reload()
            })
    }
});