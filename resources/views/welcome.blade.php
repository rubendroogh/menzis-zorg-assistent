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
        <form id="js-message-form" class="message-form">
            <div class="center-group">
                <input id="js-message-input" type="text" name="message">
                <input id="js-message-submit" type="submit" value="Stuur">
            </div>
        </form>
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
