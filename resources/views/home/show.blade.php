@extends('layouts.app')
@section('content')
    @extends('includes.menu')
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-sm-between">
                @foreach($games as $game)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h2>{{$game->name}}</h2>
                                <h5>{{$game->studio['name']}}</h5>
                                @foreach($game->genres as $genre)
                                    <span>{{$genre->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
