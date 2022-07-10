@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить игру</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Изменить игру</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.game.update', $game->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Название
                                    <input type="text" class="form-control" name="name" placeholder="Введите название игры" value="{{$game->name}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label>Выберите студию
                                        <select name="studio_id" class="form-control">
                                            @foreach($studios as $studio)
                                                <option value="{{$studio->id}}"
                                                    {{$studio->id == $game->studio_id ? 'selected' : ''}}>
                                                    {{$studio->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    @error('studio_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Жанры
                                    <select class="select2" name="genre_ids[]" multiple="multiple" data-placeholder="Выберите жанр" style="width: 100%;">
                                        @foreach($genres as $genre)
                                            <option
                                                {{is_array($game->genres->pluck('id')->toArray()) && in_array($genre->id, $game->genres->pluck('id')->toArray()) ? 'selected' : '' }}
                                                value="{{$genre->id}}">
                                                {{$genre->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('genre_ids')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
