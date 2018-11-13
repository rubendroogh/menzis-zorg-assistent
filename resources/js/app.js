
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('axios');
window.Vue = require('vue');

new Vue({
	el: '#app',
	
	data(){
		return {
            message: '',
            messages: []
		}
    },
    
    created(){
        var options = {
            method: 'POST',
            url: '/watson',
            json: true,
            data: {
                input: {
                    text: ''
                }
            }
        }

        var _this = this;

        axios(options)
            .then(function(response){
                _this.messages.push({
                    'text': response.data.output.text[0],
                    'status': 'received'
                });
                _this.message = '';
            });
    },

    methods: {
        sendRequest: function(e){
            e.preventDefault();
            
            if (this.message !== '') {

                var options = {
                    method: 'POST',
                    url: '/watson',
                    json: true,
                    data: {
                        input: {
                            text: this.message
                        }
                    }
                }

                this.messages.push({
                    'text': this.message,
                    'status': 'sent'
                });

                this.message = '';

                var _this = this;

                axios(options)
                    .then(function(response){
                        _this.messages.push({
                            'text': response.data.output.text[0],
                            'status': 'received'
                        });
                    });
            }
        }
    },

    updated(){
        var container = document.getElementById('app');
        container.scrollTop = container.scrollHeight;
    }
});
