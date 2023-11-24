const xhr = new XMLHttpRequest();

xhr.addEventListener("readystatechange", () => {
    switch (xhr.readyState) {
        case XMLHttpRequest.HEADERS_RECEIVED:
            console.log(xhr.getAllResponseHeaders());
            break;
        case XMLHttpRequest.DONE:
            console.log("Se ha completado la descarga");
            break;
        default:
            break;
    }
});

const uriComponent = encodeURIComponent("Segunda Evaluacion");
xhr.open("get", `http://localhost:63342/${uriComponent}/Tema6/Ejemplos/Ejemplo5/datos.json`);
xhr.send();