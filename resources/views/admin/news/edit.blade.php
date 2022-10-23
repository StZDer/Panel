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
    <h1>Изменить новость</h1>
</div>
<div class="container">
    <form method="post" action="{{ route('admin.news.update', $news['id']) }}" class="needs-validation"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                        placeholder="Введите название" value="{{ $news['title'] }}">
                    @error('title') <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3">{{ $news['desc'] }}</textarea>
                    @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="inputDate">Введите дату:</label>
                <input type="date" name="date" class="form-control" value="{{ $news['date']}}">
            </div>
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3 mt-3">
                <label for="image" class="form-label">Добавить несколько файлов</label>
                <input class="form-control" name="image[]" type="file" id="image" multiple>
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
            @foreach ($newsimg as $img)
            <tr>
                <th scope="row">{{$img->id}}</th>
                <td>
                    @if ($img['img'] != null)
                    <img class="img" src=" {{Storage::url($img['img'])}}">
                    @endif
                </td>
                <td>
                    <form method="post" action="{{ route('admin.newsImg.destroy', $img->id) }}">
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