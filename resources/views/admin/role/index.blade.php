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
text-white
@endsection

@section('about')
text-white
@endsection

@section('role')
active
@endsection

@section('permission')
text-white
@endsection

@section('content')
@include('inc.messages')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя роли</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role as $el)
        <tr>
            <th scope="row">{{$el->id}}</th>
            <td>{{$el->name}}</td>
            <td>{{$el->created_at}}</td>
            <td>
                Удалить
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection