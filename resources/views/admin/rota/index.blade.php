@extends('layouts.app')

@section('vite')
@vite('resources/sass/admin/news/app.scss')
@endsection

@section('news')
text-white
@endsection

@section('lab')
text-white
@endsection

@section('rota')
active
@endsection

@section('about')
text-white
@endsection

@section('content')
@include('inc.messages')
<div class="title">
    <h1>Роты</h1>
</div>
<div class="container">
    <a href="{{ route('admin.rota.create')}}">
        <button type="button" class="btn btn-success">Добавить Роту</button>
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
            @foreach ($rotas as $rotum)
            <tr>
                <th scope="row">{{ $rotum->id}}</th>
                <td>{{ $rotum->title}}</td>
                <td>{{ Str::words($rotum->desc, 10);}}</td>
                <td>{{$rotum->user}}</td>
                <td>
                    <a href="{{ route('admin.rota.edit', $rotum->id)}}">
                        <button type="button" class="btn btn-primary m-1">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </a>
                    <a href="{{ route('admin.rota.show', $rotum->id)}}">
                        <button type="button" class="btn btn-info m-1">
                            <i class="bi bi-three-dots"></i>
                        </button>
                    </a>
                    <form method="post" action="{{ route('admin.rota.destroy', $rotum->id) }}">
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