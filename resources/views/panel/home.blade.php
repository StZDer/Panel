@extends('layouts.appPanel')

@section('vite')
@vite(['resources/css/panel/home/home.css','resources/js/jquery.js'])
@endsection

@section('content')
{{-- О нас Лево вверх --}}
<a href="{{ route('panel.rotas.index') }}">
    <div class="rectangle rectangle1">
        <img src="{{asset('img/button1.png')}}" alt="">
    </div>
</a>
{{-- Новости Лево вниз--}}
<a href="{{ route('panel.news.index') }}">
    <div class="rectangle rectangle2">
        <img src="{{asset('img/button3.png')}}" alt="">
    </div>
</a>
<a href="{{ route('panel.lab.index') }}">
    <div class="rectangle rectangle3">
        <img src="{{asset('img/button2.png')}}" alt="">
    </div>
</a>
<a href="">
    <div class="rectangle rectangle4">
        <img src="{{asset('img/button4.png')}}" alt="">
    </div>
</a>
<div class="circle">
    <div class="line"></div>
    <div class="line line1"></div>
    <div class="line line2"></div>
    <div class="line line3"></div>
    <div class="line line4"></div>
    <div class="line line5"></div>
    <div class="line line6"></div>
    <div class="line line7"></div>
    <div class="line line8"></div>
    <div class="line line9"></div>
    <div class="line line10"></div>
    <div class="line line11"></div>
    <div class="line line12"></div>
    <div class="line line13"></div>
    <div class="line line14"></div>
    <div class="line line15"></div>
    <a href="{{ route('panel.about.index') }}">
        <img src="{{asset('img/logo_center.png')}}" alt="">
    </a>
</div>
@endsection