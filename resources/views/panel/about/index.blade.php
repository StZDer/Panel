@extends('layouts.appPanel')

@section('vite')
@vite(['resources/sass/panel/about/about.scss','resources/css/panel/about/about.css', 'resources/js/about.js'])
@endsection

@section('content')
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
<div class="arrow">
    <a href="{{ route('panel.home') }}">
        <svg fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </a>
</div>
<div class="split left">
    <div class="centered">
        <h1>О Технополисе ></h1>
    </div>
</div>

<div class="split right">
    <div class="centered">
        <h1>{{$about['title']}}</h1>
        <div class="content">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    @foreach($aboutimgs as $key => $aboutimg)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}"
                        class="{{$key == 0 ? 'active' : ""}}" aria-current="true"
                        aria-label="Slide {{$key+1}}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($aboutimgs as $key => $aboutimg)
                    <div class="carousel-item {{$key == 0 ? 'active' : ""}}">
                        <img src=" {{Storage::url($aboutimg['img'])}}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>
        <pre>{{$about['desc']}}</pre>
    </div>
</div>
@endsection