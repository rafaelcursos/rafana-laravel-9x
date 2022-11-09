@extends('layouts.pages')

@section('content')
    <div class="container">
        <div class="row m-0">

            <div class="col-lg-8">

                <h1>Personalize seu móvel!</h1>

                <div class="image-primary">
                    <img id="base" class="img-fluid " src="/img/statics/base.gif" alt="imagem da base">
                </div>

            </div>

            <div class="col-lg-4">

                <div class="row ">

                    <div class="cards-container">

                        @foreach ($bases as $b)
                            @foreach ($b->images as $image)
                                <div class="cards">

                                    <div class="img-card">
                                        <div class="col-6">
                                            <img onclick="trocabase(this, `{{ $b->name }}`, `{{ $b->description }}`)"
                                                class="img-fluid" src="/img/{{ $image->image }}" alt="">
                                        </div>

                                        <div class="col-6 info">
                                            <h3>{{ $b->name }}</h3>
                                            <p>{{ $b->description }}</p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
        <a id="btn-page-bases" class="btn btn-lg" href="/page_tampos/{{ $id }}">Próximo</a>
    </div>
    </div>
@endsection
