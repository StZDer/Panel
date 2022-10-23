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
active
@endsection

@section('content')
@include('inc.messages')
<div class="title">
    <h1>Изменить информацию "О нас"</h1>
</div>
<div class="container">
    <form method="post" action="{{ route('admin.about.update', $about['id']) }}" class="needs-validation"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                        placeholder="Введите название" value="{{ $about['title'] }}">
                    @error('title') <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="20">{{ $about['desc'] }}</textarea>
                    @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-1">#</th>
                <th scope="col-2">Изображение</th>
                <th scope="col-2">Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutimgs as $aboutimg)
            <tr>
                <th scope="row">{{$aboutimg->id}}</th>
                <td>
                    @if ($aboutimg['img'] != null)
                    <img class="img" src=" {{Storage::url($aboutimg['img'])}}">
                    @endif
                </td>
                <td>
                    <form method="post" action="{{ route('admin.aboutImg.destroy', $aboutimg->id) }}">
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
    <form method="post" action="{{ route('admin.about.store') }}" class="needs-validation"
        enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Добавить несколько файлов</label>
            <input class="form-control" name="image[]" type="file" id="image" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
</div>
@endsection