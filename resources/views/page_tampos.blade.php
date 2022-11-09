@extends('layouts.pages')

@section('content')
    <div class="row m-0 screen">

        <div class="col-lg-8">

            <h1>Personalize seu móvel!</h1>

            <div class="image-primary">
                <img id="tampo" class="img-fluid " src="/img/{{ $tampo }}" alt="imagem do tampo">
                <img id="base" class="img-fluid " src="" alt="imagem da base">
            </div>

        </div>

        <div class="col-lg-4">

            <div class="row ">

                <div class="cards-container">

                    @foreach ($tampos as $t)
                        @foreach ($t->images as $image)
                            <div class="cards">

                                <div class="img-card">
                                    <div class="col-6">
                                        <img onclick="trocatampo(this, `{{ $t->name }}`)" class="img-fluid"
                                            src="/img/{{ $image->image }}" alt="">
                                    </div>

                                    <div class="col-6 info">
                                        <h3>{{ $t->name }}</h3>
                                        <p>{{ $t->description }}</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>

            </div>

        </div>
    </div>
    <a id="btn-page-bases" class="btn btn-lg" href="/page_cadeiras">Próximo</a>
    </div>
@endsection
