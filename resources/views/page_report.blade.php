@extends('layouts.pages')

@section('content')
    <div class="container">

        <button onclick="window.print()" class="btn btn-sm btn-print" href="">Imprimir</button>

        <div class="row mb-5 mt-5">


            <h1>Relatório do Produto</h1>

            <div class="col-md-8 m-auto mb-3 mt-3">
                <img id="tampo" class="img-fluid " src="" alt="imagem do tampo">
                <img id="base" class="img-fluid " src="" alt="imagem da base">
            </div>

            <hr>
            <hr>

            <div class="col-12 mb-3 mt-3">
                <h2 id="nametampo"></h2>
                <p id="reportDescriptionTampo"></p>
            </div>

            <div class="col-12 mb-3 mt-3">
                <h2 id="reportNameBase"></h2>
                <p id="reportDescriptionBase"></p>
            </div>

        </div>

        <hr>
        <hr>

        <div class="row mb-3 mt-3">
            <div class="col-md-6 mb-3 mt-3">
                <div class="">
                    <img id="cadeira" class="img-fluid " src="" alt="imagem da cadeira">
                </div>
            </div>

            <div class="col-md-6 mb-3 mt-3">
                <h2 id="reportNameCadeira"></h2>
                <p id="reportDescriptionCadeira"></p>
            </div>
        </div>

    @endsection
