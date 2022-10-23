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
    <h1>Просмотр "О нас"</h1>
</div>
<div class="container">
    <fieldset disabled>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input class="form-control" id="title" name="title" value="{{ $about->title }}">
                </div>
            </div>
            <div class=" col-12">
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" id="desc" name="desc" rows="10">{{ $about['desc'] }}</textarea>
                </div>
            </div>
            <a href="{{ route('admin.about.edit', $about->id)}}">
                <button type="button" class="btn btn-primary m-1 btn-smile">
                    <i class="bi bi-pencil"></i>
                </button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Изображение</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
@endsection