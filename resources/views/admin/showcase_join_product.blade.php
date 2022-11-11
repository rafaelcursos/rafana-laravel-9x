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
                <h1 class="mb-3">Associe um item ao produto</h1>

                <form action="/showcase_join" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <h3>{{$showcase->name}}</h3>
                    <div class="form-group">
                        <input type="hidden" name="showcase" id="showcase" class="form-control" value="{{$showcase->id}}">
                    </div><br>

                    <div class="form-group">
                        <label for="product" class="form-label">Produto:</label><br>
                        <select style="max-width: 200px;" class="form-select" name="product" id="product">
                            @foreach($products as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    
                    <input type="submit" value="Associar" class="btn btn-success">
                </form><br><hr>
                <a class="btn btn-secondary" href="/showcase_insert" class="link">Voltar</a>
            </div>
        </div>
        <div class="col-lg-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item associado</th>
                        <th>Remover</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($showcase->products as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td><a href="/showcase_remove/{{$showcase->id}}/{{$p->id}}" class="btn btn-warning">Remover</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection