<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel</title>

    @yield('vite')
</head>

<body>
    <div id="app">
        <video autoplay muted loop class="myVideo">
            <source src="{{asset('video/back-video.mp4')}}" type="video/mp4">
        </video>
        @yield('content')
    </div>
</body>

</html>