let base = document.getElementById('base');
let tampo = document.getElementById('tampo');
let cadeira = document.getElementById('cadeira');
let reportNameTampo = document.getElementById('nametampo');
let reportNameBase = document.getElementById('reportNameBase');
let reportDescriptionTampo = document.getElementById('reportDescriptionTampo');
let reportDescriptionBase = document.getElementById('reportDescriptionBase');

let imgBase = localStorage.getItem('imgBase');
let imgTampo = localStorage.getItem('imgTampo');
let imgCadeira = localStorage.getItem('imgCadeira');

let nameBase = localStorage.getItem('nameBase');
let nameTampo = localStorage.getItem('nameTampo');
let nameCadeira = localStorage.getItem('nameCadeira');

let descriptionBase = localStorage.getItem('descriptionBase');
let descriptionTampo = localStorage.getItem('descriptionTampo');
let descriptionCadeira = localStorage.getItem('descriptionCadeira');

function limpar(){
    localStorage.clear();
    window.location.href = '/';
}

function trocabase(img, name, description){
    localStorage.setItem('imgBase', img.src);
    localStorage.setItem('nameBase', name);
    localStorage.setItem('descriptionBase', description);
    document.location.reload(true);
}

function trocatampo(img, name, description){
    localStorage.setItem('imgTampo', img.src);
    localStorage.setItem('nameTampo', name);
    localStorage.setItem('descriptionTampo', description);
    document.location.reload(true);
}

function trocacadeira(img, name, description){
    localStorage.setItem('imgCadeira', img.src);
    localStorage.setItem('nameCadeira', name);
    localStorage.setItem('descriptionCadeira', description);
    document.location.reload(true);
}

if(imgBase){
    base.setAttribute('src', imgBase);
}
if(imgTampo){
    tampo.setAttribute('src', imgTampo);
}
if(imgCadeira){
    cadeira.setAttribute('src', imgCadeira);
}

reportNameTampo.innerHTML = nameTampo;
reportNameBase.innerHTML = nameBase;
reportNameCadeira.innerHTML = nameCadeira;

reportDescriptionTampo.innerHTML = descriptionTampo;
reportDescriptionBase.innerHTML = descriptionBase;
reportDescriptionCadeira.innerHTML = descriptionCadeira;

