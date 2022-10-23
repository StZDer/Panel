@extends('layouts.app')

@section('vite')
@vite('resources/sass/admin/news/app.scss')
@endsection

@section('news')
active
@endsection

@section('lab')
text-white
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
    <h1>Новости</h1>
</div>
<div class="container">
    <a href="{{ route('admin.news.create')}}">
        <button type="button" class="btn btn-success">Добавить Новость</button>
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
            @foreach ($news as $el)
            <tr>
                <th scope="row">{{ $el->id}}</th>
                <td>{{ $el->title}}</td>
                <td>{{ Str::words($el->desc, 10);}}</td>
                <td>{{$el->user}}</td>
                <td>
                    <a href="{{ route('admin.news.edit', $el->id)}}">
                        <button type="button" class="btn btn-primary m-1">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </a>
                    <a href="{{ route('admin.news.show', $el->id)}}">
                        <button type="button" class="btn btn-info m-1">
                            <i class="bi bi-three-dots"></i>
                        </button>
                    </a>
                    <form method="post" action="{{ route('admin.news.destroy', $el->id) }}">
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