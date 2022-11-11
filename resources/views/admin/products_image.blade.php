@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">

                @if (session('msg'))
                    <div class="alert alert-success">
                        {{ session('msg') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="form-container"
                    style="
            border: 1px solid #eee; 
            background-color: #fff; 
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 4px 4px 1rem #eee;
            ">
                    <h1 class="mb-3">Imagem do Produto</h1>

                    <form action="/products_image/{{ $product->id }}" method="post" class="form-group"
                        enctype="multipart/form-data">
                        @csrf

                        <h3>{{ $product->name }}</h3>


                        <div class="form-group">
                            <label for="color" class="form-label">Cor deste produto:</label><br>
                            <select style="max-width: 200px;" class="form-select" name="color" id="color">
                                @foreach ($colors as $c)
                                    <option value="{{ $c->color }}">{{ $c->color }}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Selecione a imagem do Produto</label><br>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div><br>
                        <input type="submit" value="Enviar Imagem" class="btn btn-success">
                    </form>
                    <a class="btn btn-secondary mt-5" href="/products_insert">Voltar</a>

                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <h3>Imagens</h3>
                @foreach ($product->images as $i)
                    <div class="d-flex  gap-3">
                        <img width="200" class="img-fluid" src="{{Storage::url($i->image)}}" alt="">
                        <form action="/products_image/{{ $i->id }}/{{$product->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Tem certeza disso?')"
                                href="">Deletar</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
