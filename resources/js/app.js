/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');
import Echo from 'laravel-echo';


require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('card-list', require('./components/CardList.vue').default);
Vue.component('chat-message', require('./components/ChatMessage.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            messages: []
        }
    },
    created() {
        this.fetchMessages()
        this.getMessage()
    },
    methods: {
        async fetchMessages() {
            await axios({
                url: '/messages/1',
                method: 'GET'
            })
                .then(res => this.messages = res.data);
        },

        async addMessage(message) {
            if (message.message !== '') {
                const newMess = await {
                    ...message,
                    created_at: new Date().toISOString()
                }

                this.messages.push(newMess)

                await axios({
                    url: '/send-message/1',
                    method: 'POST',
                    data: {
                        message: message.message
                    }
                })
            }
        },

        getMessage() {
            window.Echo.private('chat')
                .listen('MessageSent', (e) => {
                    const newMess = {
                        ...e.message,
                        user: e.user
                    }
                    this.messages.push(newMess);
                });
        }
    }
});


require('./bootstrap');
