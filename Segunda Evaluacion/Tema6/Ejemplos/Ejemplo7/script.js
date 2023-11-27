const xhr = new XMLHttpRequest();

xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        const result = JSON.parse(xhr.response);
        console.log(result);
    }
});

const uriComponent = encodeURIComponent("Segunda Evaluacion");
xhr.open("get", `http://localhost:63342/${uriComponent}/Tema6/Ejemplos/Ejemplo7/datos.json`);
xhr.send();