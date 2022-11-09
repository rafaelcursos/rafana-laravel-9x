@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Painel</h1>

        <div class="col-lg-6 m-auto">

            @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <h3>Atualizar Produto</h3>

            <hr>

            <form class="form-group" action="/products_update/{{$product->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label" for="name">Nome do Produto</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="height">Altura do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="height" id="height" class="form-control" value="{{$product->height}}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="width">Largura do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="width" id="width" class="form-control" value="{{$product->width}}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="lenght">Comprimento do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="lenght" id="lenght" class="form-control" value="{{$product->lenght}}">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="price">Preço do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="price" id="price" class="form-control" value="{{$product->price}}">
                </div><br>
                <div class="form-group">
                    <label for="type" class="form-label">Tipo de produto</label>
                    <select name="type" id="type" class="form-control">
                        <option value="{{$product->type}}" selected>{{$product->type}}</option>
                        @foreach($types as $type)
                        <option value="{{$type->type}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div><br>
                <input class="btn btn-success" type="submit" value="Cadastrar">
            </form>
        </div>
        
    </div>
</div>
@endsection