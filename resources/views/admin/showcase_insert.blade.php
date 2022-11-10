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

            <h3>Cadastre um Novo Produto na Vitrine</h3>

            <hr>

            <form class="form-group" action="/showcase_insert" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Nome do Produto</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome do produto">
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Selecione a imagem do Produto</label><br>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div><br>

                <input class="btn btn-success" type="submit" value="Cadastrar">
            </form>
        </div>

        <div class="col-lg-6">

            <h3>Vitrine</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Associar</th>
                        <th>Atualizar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($showcase as $s)
                    <tr>
                        <td>{{$s->name}}</td>
                        <td><img width="100" src="{{Storage::url($s->image)}}" alt="{{$s->name}}"></td>
                        <td><a class="btn btn-secondary" href="/showcase_join/{{$s->id}}">Itens</a></td>
                        <td><a class="btn btn-primary" href="/showcase_update/{{$s->id}}">Atualizar</a></td>
                        <td>
                            <form action="/showcase_delete/{{$s->id}}" method="post">
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