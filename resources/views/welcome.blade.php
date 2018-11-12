<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app" class="app">
            <form id="js-message-form" class="message-form">
                <div class="center-group">
                    <input v-model="message" type="text">
                    <input v-on:click='sendRequest($event)' type="submit" value="Stuur">
                </div>
            </form>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
