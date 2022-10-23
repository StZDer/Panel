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
    <h1>Добавить лабораторию</h1>
</div>
<div class="container">
    <form method="post" action="{{ route('admin.lab.store') }}" class="needs-validation" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="svg" class="form-label">Добавить svg</label>
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
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>
@endsection