@extends('layouts.appPanel')

@section('vite')
@vite('resources/css/panel/company/company.css')
@endsection

@section('content')
<div class="arrow">
    <a href="{{ route('panel.home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </a>
</div>
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
<div class="content">
    <div class="arrow">
        <a href="{{ route('panel.home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-circle"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </a>
    </div>
    <div class="outsideBig">
        <div class="insideBig">
            <img src="{{asset('img/ERA/EPA.jpg')}}" alt="">
        </div>
    </div>
    <div class="title">
        НАУЧНЫЕ РОТЫ
        <div class="decoration">
            ТЕХНОПОЛИСА "ЭРА"
        </div>
    </div>
    <div class="logo">
        <img src="{{asset('img/logotip.png')}}" alt="" />
    </div>
    {{-- <div class="lab1"> --}}
        <div class="containerLab">
            @foreach ($rotas as $rota)
            <div class="outside">
                <div class="inside">
                    <a href="{{ route('panel.rota.desc', $rota['id']) }}">
                        <img class="img" src=" {{Storage::url($rota['svg'])}}">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{--
    </div> --}}
</div>
@endsection