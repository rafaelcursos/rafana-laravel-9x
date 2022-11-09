let base = document.getElementById('base');
let tampo = document.getElementById('tampo');
let cadeira = document.getElementById('cadeira');
let imgBase = localStorage.getItem('imgBase');
let imgTampo = localStorage.getItem('imgTampo');
let imgCadeira = localStorage.getItem('imgCadeira');


function trocabase(img, name){
    localStorage.setItem('imgBase', img.src);
    localStorage.setItem('nameBase', name);
    document.location.reload(true);
}

function trocatampo(img, name){
    localStorage.setItem('imgTampo', img.src);
    localStorage.setItem('nameTampo', name);
    document.location.reload(true);
}

function trocacadeira(img, name){
    localStorage.setItem('imgCadeira', img.src);
    localStorage.setItem('nameCadeira', name);
    document.location.reload(true);
}

base.setAttribute('src', imgBase);
tampo.setAttribute('src', imgTampo);
cadeira.setAttribute('src', imgCadeira);
