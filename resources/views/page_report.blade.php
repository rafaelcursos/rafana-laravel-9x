@extends('layouts.pages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-2">
            <a onclick="limpar()" href="javascript:void(0)">
                <img width="150" src="/img/statics/logo.png" alt="">
            </a>
        </div>
    </div>
    <hr>
    <div class="relatorio">

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
            <div class="col-md-6 mb-3 mt-3 text-center">
                    <img width="200" id="cadeira" class="img-fluid" src="" alt="imagem da cadeira">
            </div>

            <div class="col-md-6 mb-3 mt-3">
                <h2 id="reportNameCadeira"></h2>
                <p id="reportDescriptionCadeira"></p>
            </div>
        </div>
        <a href="https://wa.me/5532998083600"
            style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
      z-index:1000;"
            target="_blank">
            <i style="margin-top:16px" class="fa fa-whatsapp"></i>
        </a>
    </div>
    @endsection
