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
    <h1>Просмотр новости</h1>
</div>
<div class="container">
    <fieldset disabled>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input class="form-control" id="title" name="title" value="{{ $news->title }}">
                </div>
            </div>
            <div class=" col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="10">{{ $news['desc'] }}</textarea>
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
                    @foreach ($newsimg as $img)
                    <tr>
                        <th scope="row">{{$img->id}}</th>
                        <td>
                            @if ($img['img'] != null)
                            <img class="img" src=" {{Storage::url($img['img'])}}">
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