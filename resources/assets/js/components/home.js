Vue.component('home', {
    props: ['user'],

    ready() {
        //
    }
});

Vue.component('example', require('./example.vue'));
Vue.component('message_add', require('./messages/add.vue'));