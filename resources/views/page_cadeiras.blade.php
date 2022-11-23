@extends('layouts.pages')

@section('content')
    <div class="container-fluid body">
        <div class="row">
            <div class="col-12 mt-2">
                <a onclick="limpar()" href="javascript:void(0)">
                    <img width="150" src="/img/statics/logo.png" alt="">
                </a>
            </div>
        </div>
        <hr>
        <div class="row m-0">

            <div class="col-lg-10 mb-5 m-0 p-0">

                <h1>Personalize seu móvel!</h1>

                <div class="image-primary">
                    <div class="row p-0">
                        <div class="col-9">
                            <img id="tampo" class="img-fluid " src="" alt="imagem do tampo">
                            <img id="base" class="img-fluid " src="" alt="imagem da base">
                        </div>
                        <div  class="col-3">
                            <div class="cadeira-container">
                                <img  id="cadeira" class="img-fluid " src="{{ Storage::url($cadeira[0]->image)}}" alt="imagem da cadeira">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-2">
                <div class="row ">
                    <div class="cards-container">
                        @foreach ($cadeiras as $c)
                            @foreach ($c->images as $image)
                                <div onclick="trocacadeira(`{{ Storage::url($image->image) }}`, `{{ $c->name }}`, `{{ $c->description }}`)"
                                    class="cards">
                                    <div class="img-card">
                                        <img width="100" height="100" class="img-fluid"
                                            src="{{ Storage::url($image->image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
        <a class="botao-voltar" href="#" onclick="window.history.back()" >voltar</a>
        <a class="botao-pages" href="/page_report">Próximo</a>
    </div>
@endsection
