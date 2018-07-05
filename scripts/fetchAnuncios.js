var httpRequest = new XMLHttpRequest();
var anuncios = document.querySelector(".anuncios");
var anterior = document.querySelector(".btn-anterior");
var proximo = document.querySelector(".btn-proximo");
var imoveis = document.querySelector(".btn-imoveis");
var moveis = document.querySelector(".btn-moveis");
var eletrodomesticos = document.querySelector(".btn-eletrodomesticos");
var outros = document.querySelector(".btn-outros");
var todas = document.querySelector(".btn-todas");
var categoria = "";
var anunciosPagina = 3;  // quantida de anuncios por página.
var anunciosPaginaAtual; 
var pagina = 0;          // pagina atual
var ultimo_pagina = [0];   

httpRequest.onreadystatechange = displayAnuncios;

makeHTTPRequest();

todas.onclick = function(){
    pagina = 0;
    categoria = "";
    makeHTTPRequest();
}

imoveis.onclick = function(){
    pagina = 0;
    categoria = 'imoveis';
	makeHTTPRequest();
}

moveis.onclick = function(){
    pagina = 0;
    categoria = 'moveis';
	makeHTTPRequest();
}

eletrodomesticos.onclick = function(){
    pagina = 0;
    categoria = 'eletrodomesticos';
	makeHTTPRequest();
}

outros.onclick = function(){
    pagina = 0;
    categoria = 'outros';
	makeHTTPRequest();
}


anterior.onclick = function(){
    if(pagina != 0){
        pagina--;
        makeHTTPRequest();
    }
    else{
        alert("primeira página");
    }

}

proximo.onclick = function(){
    if(anunciosPaginaAtual < anunciosPagina){
        alert("ultima página");
    }
    else{
        pagina++;
        makeHTTPRequest();
    }
}

function makeHTTPRequest(){
    var from = ultimo_pagina[pagina]; 
    httpRequest.open('GET', 'http://localhost/control/fetchAnuncios.php?from=' + from + '&limit=' + anunciosPagina + '&categoria=' + categoria, true);
    httpRequest.send();
}

function displayAnuncios(){
    // processar a resposta do request aqui.
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if(httpRequest.status === 200){
            var response = JSON.parse(httpRequest.responseText);
            // limpa resultados anteriores
            while(anuncios.firstChild){
                anuncios.removeChild(anuncios.firstChild);
            }
            var max = 0;
            anunciosPaginaAtual = 0;
            response.forEach(function(element) {
                var anuncio = document.createElement("div");
                var img = document.createElement("img");
                var titulo = document.createElement("a");
                var h2 = document.createElement("h2");
                var descricao = document.createElement("p");

                if(element.id > max ){
                    max = element.id;
                }

                anuncio.classList.add("anuncio");
                img.src = element.imgsrc;
                img.classList.add("img-anuncio");
                h2.textContent = element.titulo;
                titulo.href = element.link;
                titulo.appendChild(h2);
                descricao.textContent = element.detalhes;

                anuncio.appendChild(img);
                anuncio.appendChild(titulo);
                anuncio.appendChild(descricao);
                anuncios.appendChild(anuncio);
                anunciosPaginaAtual++;
            }, this);
            ultimo_pagina[pagina + 1] = max;
            console.log(ultimo_pagina);
        }
    } 
}

