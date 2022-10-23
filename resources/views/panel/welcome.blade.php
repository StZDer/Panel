<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>Panel</title>

    <!-- Fonts -->
    @vite([
    'resources/sass/app.scss',
    'resources/css/app.css'])
</head>

<body>
    <a href="{{ route('panel.home')}}">
        <video autoplay muted loop class="myVideo">
            <source src="{{asset('video/video-gl.mp4')}}" type="video/mp4">
        </video>
    </a>
</body>

</html>