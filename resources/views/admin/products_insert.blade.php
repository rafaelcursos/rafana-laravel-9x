@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Painel</h1>

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

            <h3>Cadastre um Novo Item</h3>

            <hr>

            <form class="form-group" action="/products_insert" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Nome do Produto</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome do produto">
                </div>
                <div class="form-group">
                    <label class="form-label" for="height">Altura do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="height" id="height" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label" for="width">Largura do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="width" id="width" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label" for="lenght">Comprimento do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="lenght" id="lenght" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="price">Preço do Produto</label>
                    <input style="max-width: 300px" type="number" step="0.01" min="0" name="price" id="price" class="form-control">
                </div><br>
                <div class="form-group">
                    <label for="type" class="form-label">Tipo de produto</label>
                    <select name="type" id="type" class="form-control">
                        @foreach($types as $type)
                        <option value="{{$type->type}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div><br>
                <input class="btn btn-success" type="submit" value="Cadastrar">
            </form>
        </div>
        <div class="col-lg-6">
            <h3>Todos os itens</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Inserir</th>
                        <th>Atualizar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td><a class="btn btn-secondary" href="/products_image/{{$p->id}}">Imagem</a></td>
                        <td><a class="btn btn-primary" href="/products_update/{{$p->id}}">Atualizar</a></td>
                        <td>
                            <form action="/products_delete/{{$p->id}}" method="post">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Tem certeza disso?')" href="">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection