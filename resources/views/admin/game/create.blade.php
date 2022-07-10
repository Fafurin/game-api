@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создать запись об игре</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Создать запись об игре</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.game.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Название
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Введите название игры"
                                           value="{{old('name')}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <div class="form-group">
                                    <label>Выберите студию
                                        <select name="studio_id" class="form-control">
                                            @foreach($studios as $studio)
                                                <option value="{{$studio->id}}"
                                                    {{$studio->id == old('studio_id') ? 'selected' : ''}}>
                                                    {{$studio->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Жанры
                                    <select class="select2" name="genre_ids[]" multiple="multiple"
                                            data-placeholder="Выберите жанры"
                                            style="width: 100%;">
                                        @foreach($genres as $genre)
                                            <option
                                                {{is_array(old('genre_ids')) && in_array($genre->id, old('genre_ids')) ? 'selected' : '' }}
                                                value="{{$genre->id}}">
                                                {{$genre->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection


