@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6">

            @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="form-container" style="
            border: 1px solid #eee; 
            background-color: #fff; 
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 4px 4px 1rem #eee;
            ">
                <h1 class="mb-3">Cadastre uma Cor</h1>

                <form action="/products_color" method="post" class="form-group">
                    @csrf

                    <div class="form-group">
                        <label for="color">Nome da cor:</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div><br>

                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <ul>
                @foreach($colors as $c)
                <li>{{$c->color}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection