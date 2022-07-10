<div class="row">
    <div class="col-10 d-flex justify-content-sm-between">
        <span>Apricode test project</span>
    </div>
    <div class="col-2 d-flex justify-content-sm-between">
        <a href="/">Главная</a>
        <a href="{{route('admin.main.index')}}">Админка</a>
    </div>
</div>
<div class="d-flex justify-content-sm-between">
    @foreach($genres as $genre)
        <a class="nav-link" href="{{route('home.show', $genre->id)}}">{{$genre->name}}</a>
    @endforeach
</div>


