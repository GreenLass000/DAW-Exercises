const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        console.log(JSON.parse(xhr.response));
    }
});

const uriComponent = encodeURIComponent("Segunda Evaluacion");
xhr.open("get", `http://localhost:63342/${uriComponent}/Tema6/Ejemplos/Ejemplo4/datos.json`);
xhr.send();