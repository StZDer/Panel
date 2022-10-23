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
    <h1>Просмотр лаборатории</h1>
</div>
<div class="container">
    <fieldset disabled>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input class="form-control" id="title" name="title" value="{{ $rota->title }}">
                </div>
            </div>
            <div class=" col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="10">{{ $rota['desc'] }}</textarea>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Изображение</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rotasimg as $rotaimg)
                    <tr>
                        <th scope="row">{{$rotaimg->id}}</th>
                        <td>
                            @if ($rotaimg['img'] != null)
                            <img class="img" src=" {{Storage::url($rotaimg['img'])}}">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
@endsection