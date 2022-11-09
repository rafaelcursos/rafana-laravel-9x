@extends('layouts.pages')

@section('content')
    <div class="container">
        <h1>Relatório do Produto</h1>

        <h2>Nome do Tampo: <span id="nametampo"></span></h2>
        <h2>Nome da Base: <span id="reportNameBase"></span></h2>

        <img id="tampo" class="img-fluid " src="" alt="imagem do tampo">
        <img id="base" class="img-fluid " src="" alt="imagem da base">
        <div class="cadeira-container">
            <img id="cadeira" class="img-fluid " src="" alt="imagem da cadeira">
        </div>

        <h3>Descrição do Tampo:</h3>
        <p id="reportDescriptionTampo"></p>

        <h3>Descrição do Base:</h3>
        <p id="reportDescriptionBase"></p>
    </div>
@endsection
