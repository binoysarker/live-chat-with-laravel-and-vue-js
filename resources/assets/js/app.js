
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'


// use auto scroll
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

//for notification
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000});

Vue.component('app-message', require('./components/Message.vue'));

const app = new Vue({
    el: '#app',
    data:{
    	message:'',
    	chat:{
    		messages:[],
            users:[],
            colors:[],
            time:[],

    	},
        typing:'',
        numberOfUsers:0,
    },
    watch:{
        message(){
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message,
                });

        }
    },
    methods:{
        senMessage(){
            this.chat.messages.push(this.message);
            this.chat.users.push('You');
            this.chat.colors.push('success');
            this.chat.time.push(this.getTime());

            axios.post('/send', {
                message:this.message,

            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.message = '';
        },
        getTime(){
            let time = new Date();
            return time.getHours()+':'+ time.getMinutes();
        }
    },
    mounted(){
        Echo.private('chat')
            .listen('chatEvent', (e) => {
                this.chat.messages.push(e.message);
                this.chat.users.push(e.user);
                this.chat.colors.push('info');
                this.chat.time.push(this.getTime());
            })
            .listenForWhisper('typing', (e) => {
                if (e.name != ''){
                    this.typing = 'Typing...';
                }else{
                    this.typing = '';
                }
            });
        Echo.join(`chat`)
            .here((users) => {
                // console.log(users);
                this.numberOfUsers = users.length;
            })
            .joining((user) => {
                this.numberOfUsers +=1;
                this.$toaster.success(user.name +' is joined in the chat room');
                // console.log(user.name);
            })
            .leaving((user) => {
                this.numberOfUsers -=1;
                this.$toaster.warning(user.name +' leaved the chat room');
                // console.log(user.name);
            });
    }
});
