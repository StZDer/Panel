@extends('layouts.appPanel')

@section('vite')
@vite(['resources/js/swiper.js','resources/sass/panel/swiper.scss', 'resources/js/jquery.js','resources/css/app.css',])
@endsection

@section('content')
<!-- Slider main container -->
<div class="news-logo">
    <h4>НОВОСТИ</h4>
</div>
<div class="logo-right">
    <img src="{{asset('img/logo_cool(only_star).png')}}" alt="логотип" />
</div>
<div class="arrow">
    <a href="{{ route('panel.home') }}">
        <svg fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </a>
</div>
<div class="float">
    <!-- Slider main wrapper -->
    <!-- Slider main wrapper -->
    <div class="swiper-container-wrapper">
        <!-- Slider main container -->
        <div class="swiper-container gallery-top">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($news as $el)
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="title">
                        {{$el['title']}}
                    </div>
                    <div class="description">
                        <div id="carouselExampleIndicators{{$el['id']}}" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                @foreach($el->images as $key => $img)
                                <button type="button" data-bs-target="#carouselExampleIndicators{{$el['id']}}"
                                    data-bs-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ""}}"
                                    aria-current="true" aria-label="Slide {{$key+1}}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($el->images as $key => $img)
                                <div class="carousel-item {{$key == 0 ? 'active' : ""}}">
                                    <img src=" {{Storage::url($img['img'])}}" class="d-block w-100" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators{{$el['id']}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Предыдущий</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators{{$el['id']}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Следующий</span>
                            </button>
                        </div>
                        <pre>{{$el['desc']}}</pre>
                        <div class="data">{{\Carbon\Carbon::parse($el['date'])->format('d.m.Y')}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Slider thumbnail container -->
        <div class="swiper-container gallery-thumbs">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($news as $el)
                <div class="swiper-slide">
                    <img src=" {{Storage::url($el->images[0]['img'])}}" alt="" />
                    <h5>
                        {{$el['title']}}
                    </h5>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection