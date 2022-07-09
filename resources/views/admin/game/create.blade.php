@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create game</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item active">Create game</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.game.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Enter the game name"
                                           value="{{old('name')}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <div class="form-group">
                                    <label>Select studio
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
                                <label>Genres
                                    <select class="select2" name="genre_ids[]" multiple="multiple"
                                            data-placeholder="Select genres"
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
                                <input type="submit" class="btn btn-primary" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection


