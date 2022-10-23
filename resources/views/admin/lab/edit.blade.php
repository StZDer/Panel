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
    <h1>Изменить лабораторию</h1>
    @if ($lab['svg'] != null)
    <img class="img" src=" {{Storage::url($lab['svg'])}}">
    @else
    <div class="alert alert-danger" role="alert">
        SVG отсутствует!
    </div>
    @endif
</div>
<div class="container">
    <form method="post" action="{{ route('admin.lab.update', $lab['id']) }}" class="needs-validation"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                        placeholder="Введите название" value="{{ $lab['title'] }}">
                    @error('title') <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3">{{ $lab['desc'] }}</textarea>
                    @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="svg" class="form-label">Изменить svg</label>
                    <input class="form-control" name="svg" type="file" id="svg">
                </div>
                @error('svg')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="image" class="form-label">Добавить несколько файлов</label>
                    <input class="form-control" name="image[]" type="file" id="image" multiple>
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Изображение</th>
                <th scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labsimg as $labimg)
            <tr>
                <th scope="row">{{$labimg->id}}</th>
                <td>
                    @if ($labimg['img'] != null)
                    <img class="img" src=" {{Storage::url($labimg['img'])}}">
                    @endif
                </td>
                <td>
                    <form method="post" action="{{ route('admin.labImg.destroy', $labimg->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="subbmit" class="btn btn-danger m-1">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection