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

            <div class="col-lg-9 mb-5 m-0 p-0">

                <h1>Personalize seu móvel!</h1>

                <div class="image-primary">
                    <img id="tampo" class="img-fluid " src="/img/statics/tampo.gif" alt="imagem do tampo">
                    <img id="base" class="img-fluid " src="" alt="imagem da base">
                </div>

            </div>

            <div class="col-lg-3 ">
                <div class="row ">
                    <div class="cards-container">
                        @foreach ($tampos as $t)
                            @foreach ($t->images as $image)
                                <div onclick="trocatampo(`{{ Storage::url($image->image) }}`, `{{ $t->name }}`, `{{ $t->description }}`)"
                                    class="cards">
                                    <div class="img-card ">
                                        <img class="img-fluid" src="{{ Storage::url($image->image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <a class="botao-voltar" href="#" onclick="window.history.back()" >voltar</a>
        <a class="botao-pages" href="/page_cadeiras">Próximo</a>
    </div>
    </div>
@endsection
