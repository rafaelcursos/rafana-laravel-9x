@extends('layouts.pages')

@section('content')
    <div class="container body">
        <div class="row">
            <div class="col-12 mt-2">
                <a onclick="limpar()" href="javascript:void(0)">
                    <img width="150" src="/img/statics/logo.png" alt="">
                </a>
            </div>
        </div>
        <hr>
        <div class="row m-0">

            <div class="col-lg-8">

                <h1>Personalize seu móvel!</h1>

                <div class="image-primary">
                    <img id="tampo" class="img-fluid " src="" alt="imagem do tampo">
                    <img id="base" class="img-fluid " src="" alt="imagem da base">
                    <div class="cadeira-container">
                        <img id="cadeira" class="img-fluid " src="" alt="imagem da cadeira">
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="row ">

                    <div class="cards-container">

                        @foreach ($cadeiras as $c)
                            @foreach ($c->images as $image)
                                <div onclick="trocacadeira(`{{ Storage::url($image->image) }}`, `{{ $c->name }}`, `{{ $c->description }}`)"
                                    class="cards">

                                    <div class="img-card">
                                        <div class="col-6">
                                            <img class="img-fluid" src="{{ Storage::url($image->image) }}" alt="">
                                        </div>

                                        <div class="col-6 info">
                                            <h5>{{ $c->name }}</h5>                                        
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
        <a class="botao-pages" href="/page_report">Próximo</a>
    </div>
@endsection
