@extends('layouts.pages')

@section('content')
<div class="container">


    <div class="row">
        <h1>Personalize seu Móvel</h1>

        @foreach($showcase as $s)

        <div class="col-lg-3">
            <a href="/select/{{$s->id}}">
                <div class="card" style="border: 0; box-shadow: 2px 2px 8px #eee">
                    <img style="border: 1px solid #eee; margin:1rem; min-height: 200px;" src="img/showcase/{{$s->image}}" alt="{{$s->name}}">
                    <h3 style="margin:1rem">{{$s->name}}</h3>
                </div>
            </a>
        </div>
        @endforeach

    </div>

</div>
@endsection