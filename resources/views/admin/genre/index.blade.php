@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Жанры</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Жанры</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.genre.create')}}" class="btn btn-block btn-primary">Создать</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Создан</th>
                                        <th>Изменен</th>
                                        <th colspan="2">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($genres as $genre)
                                        <tr>
                                            <td>{{$genre->id}}</td>
                                            <td>{{$genre->name}}</td>
                                            <td>{{$genre->created_at}}</td>
                                            <td>{{$genre->updated_at}}</td>
                                            <td><a class="text-success"
                                                   href="{{route('admin.genre.edit', $genre->id)}}">
                                                    <i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.genre.delete', $genre->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
