@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit game</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item active">Edit game</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.game.update', $game->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Name
                                    <input type="text" class="form-control" name="name" placeholder="Enter the game name" value="{{$game->name}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                    <label>Select studio
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
                                <label>Genres
                                    <select class="select2" name="genre_ids[]" multiple="multiple" data-placeholder="Select genres" style="width: 100%;">
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
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
