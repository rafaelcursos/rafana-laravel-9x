@extends('layouts.pages')

@section('content')
    <div class="row m-0 screen">

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
                            <div class="cards">

                                <div class="img-card">
                                    <div class="col-6">
                                        <img onclick="trocacadeira(this, `{{ $c->name }}`)" class="img-fluid"
                                            src="/img/{{ $image->image }}" alt="">
                                    </div>

                                    <div class="col-6 info">
                                        <h3>{{ $c->name }}</h3>
                                        <p>{{ $c->description }}</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>

            </div>

        </div>
    </div>
    <a id="btn-page-bases" class="btn btn-lg" href="/page_tampos">Próximo</a>
    </div>
@endsection
