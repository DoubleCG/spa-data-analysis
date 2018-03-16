<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{{ asset('img/favicon.ico') }}}">
    <title>欢迎使用</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        #loading-img{
            position:fixed;
            top:50%;
            left:50%;
            transform:translateX(-50%) translateY(-50%);
        }
    </style>

    <script defer src="/js/app.js"></script>

</head>
<body>

<img id='loading-img' src='/images/loading.gif'></img>
<script>
    window.LoadingImg = document.getElementById('loading-img');
</script>
<div id="app">
    <app></app>
</div>


</body>
</html>
