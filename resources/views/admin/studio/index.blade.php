@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Studios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item active">Studios</li>
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

                    <div class="col-1 mb-3">
                        <a href="{{route('admin.studio.create')}}" class="btn btn-block btn-primary">Create</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th colspan="3">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($studios as $studio)
                                        <tr>
                                            <td>{{$studio->id}}</td>
                                            <td>{{$studio->name}}</td>
                                            <td>{{$studio->created_at}}</td>
                                            <td>{{$studio->updated_at}}</td>
                                            <td><a class="text-success"
                                                   href="{{route('admin.studio.edit', $studio->id)}}">
                                                    <i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.studio.delete', $studio->id)}}" method="POST">
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
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
