<!DOCTYPE html>
<html>

<head>
    <title>WEBAMTHUC</title>
    <base href="{{asset('')}}">
    <link  rel="stylesheet" type="text/css" href='css/Demo.css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="header">
        @include('header')
    </div>
    <div class="body">
        @yield('content')
    </div>
    <div class="footer">
        @include('footer')
    </div>
    <script type="text/javascript" src='jquery/jquery.js'></script>
    <script type="text/javascript" src="jquery/jq.js"></script>
</body>

</html>