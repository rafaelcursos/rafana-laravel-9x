@extends('layouts.pages')

@section('content')
<div class="container">

    <h1>Personalize seu Móvel</h1>

    <div class="row">
        @foreach($products as $p)
        
        <div class="col-lg-3">
            <a href="/select/{{$p->id}}">
                <div class="card" style="border: 0; box-shadow: 2px 2px 8px #eee">
                    <img style="border: 1px solid #eee; margin:1rem; min-height: 200px;" src="img/{{$image->image}}" alt="{{$p->name}}">
                    <h3 style="margin:1rem">{{$p->name}}</h3>
                </div>
            </a>
        </div>
        @endforeach
    </div>

</div>
@endsection