@extends('layouts.pages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-2">
            <a onclick="limpar()" href="javascript:void(0)">
                <img width="150" src="/img/statics/logo.png" alt="">
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <h1>Personalize seu Móvel</h1>

        @foreach($showcase as $s)

        <div class="col-lg-4">
            <a href="/page_bases/{{$s->id}}">
                <div class="showcase-card">
                    <img class="img-fluid" src="{{Storage::url($s->image)}}" alt="{{$s->name}}">
                    <h3>{{$s->name}}</h3>
                </div>
            </a>
        </div>
        @endforeach

    </div>

</div>
@endsection