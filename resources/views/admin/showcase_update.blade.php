@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Painel</h1>

        <div class="col-lg-6 m-auto">


            <h3>Atualizar</h3>

            <hr>

            <form class="form-group" action="/showcase_update/{{$showcase->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="name">Nome do Produto</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$showcase->name}}">
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$showcase->description}}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Selecione a imagem do Produto</label><br>
                    <input type="file" name="image" id="image" class="form-control-file" value="{{$showcase->image}}">
                    <img width="200" src="{{Storage::url($showcase->image)}}" alt="">
                </div><br>

                <input class="btn btn-success" type="submit" value="Atualizar">
            </form>
        </div>
    </div>
</div>
@endsection