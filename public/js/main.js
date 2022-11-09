let base = document.getElementById('base');

let imgBase = localStorage.getItem('imgBase')
base.setAttribute('src', imgBase)


function trocabase(img, name){
    localStorage.setItem('imgBase', img.src);
    localStorage.setItem('nameBase', name);
    document.location.reload(true)
}