@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto mt-5">

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
                <h1 class="mb-3">Imagem do Produto</h1>

                <form action="/products_image" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="product" class="form-label">Produto:</label><br>
                        <select style="max-width: 200px;" class="form-select" name="product" id="product">
                            @foreach($products as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="color" class="form-label">Cor deste produto:</label><br>
                        <select style="max-width: 200px;" class="form-select" name="color" id="color">
                            @foreach($colors as $c)
                            <option value="{{$c->color}}">{{$c->color}}</option>
                            @endforeach
                        </select>
                    </div><br>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Selecione a imagem do Produto</label><br>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div><br>
                    <input type="submit" value="Enviar Imagem" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection