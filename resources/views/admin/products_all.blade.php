@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Painel</h1>

        <div class="col-12 m-auto">

        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <h3>Produtos</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Inserir</th>
                        <th>Atualizar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->description}}</td>
                        <td><a class="btn btn-secondary" href="/products_image/{{$p->id}}">Inserir Imagem</a></td>
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