
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// $('#js-message-form').submit(function(event){
//     event.preventDefault();
//     var message = $('#js-message-input').val();
//     console.log(message);
// });

connectToWatson();

function connectToWatson(){
    
}

var AssistantV1 = require('watson-developer-cloud/assistant/v1');

var assistant = new AssistantV1({
    version: '2018-09-20',
    iam_apikey: 'PZyDAuxKrJv2tLPg6r8JZRKOnPMJFk6YCkjKxxrZ5bdr',
    url: 'https://gateway-fra.watsonplatform.net/assistant/api/v1/workspaces/1ac057b8-0634-4c6a-b8e5-ec8a46e1da57/message/'
});

function sendMessage(text, context){
    // stuur bericht naar Watson
    
}

function renderMessage(){
    // poep response uit
}