@extends('layouts.app')

@section('vite')
@vite('resources/sass/admin/news/app.scss')
@endsection

@section('news')
text-white
@endsection

@section('lab')
active
@endsection

@section('rota')
text-white
@endsection

@section('about')
text-white
@endsection

@section('content')
@include('inc.messages')
<div class="title">
    <h1>Лаборатории</h1>
</div>
<div class="container">
    <a href="{{ route('admin.lab.create')}}">
        <button type="button" class="btn btn-success">Добавить Лабораторию</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Оглавление</th>
                <th scope="col">Подробнее</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labs as $lab)
            <tr>
                <th scope="row">{{ $lab->id}}</th>
                <td>{{ $lab->title}}</td>
                <td>{{ Str::words($lab->desc, 10);}}</td>
                <td>{{$lab->user}}</td>
                <td>
                    <a href="{{ route('admin.lab.edit', $lab->id)}}">
                        <button type="button" class="btn btn-primary m-1">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </a>
                    <a href="{{ route('admin.lab.show', $lab->id)}}">
                        <button type="button" class="btn btn-info m-1">
                            <i class="bi bi-three-dots"></i>
                        </button>
                    </a>
                    <form method="post" action="{{ route('admin.lab.destroy', $lab->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-1">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection