const xhr = new XMLHttpRequest();

xhr.addEventListener("readystatechange", () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.statusText);
    }
});

const uriComponent = encodeURIComponent("Segunda Evaluacion");
xhr.open("get", `http://localhost:63342/${uriComponent}/Tema6/Ejemplos/Ejemplo6/datos.json`);
xhr.send();