<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 5.6 Vue JS axios post - ItSolutionStuff.com</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="http://unpkg.com/iview/dist/styles/iview.css">
    <script src="http://vuejs.org/js/vue.min.js"></script>
    <script src="http://unpkg.com/iview/dist/iview.min.js"></script>
    <script src="//unpkg.com/vue-fullscreen/dist/vue-fullscreen.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


</head>

<body>

<div id="app">

    <index></index>

</div>

<script src="{{asset('js/app.js')}}" ></script>


</body>

</html>
