<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Load c3.css -->
        <link href="/c3-0.4.18/c3.css" rel="stylesheet">

        <!-- Load d3.js and c3.js -->
        <script src="https://d3js.org/d3.v3.min.js"></script>
        <script src="/c3-0.4.18/c3.min.js"></script>
    </head>
    <body>
    <style>
        body,html{
            margin: 0;
            padding: 0;
        }
    </style>
        <div id="app">
            <example-component></example-component>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
