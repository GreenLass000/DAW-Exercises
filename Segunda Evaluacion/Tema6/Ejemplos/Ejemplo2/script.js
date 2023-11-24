const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        document.querySelector(".container").innerHTML = xhr.response;
    }
});

document.querySelector("#btn")
    .addEventListener("click", () => {
        const uriComponent = encodeURIComponent("Segunda Evaluacion");
        xhr.open("get", `http://localhost:63342/${uriComponent}/Tema6/Ejemplos/Ejemplo2/datos.html`);
        xhr.send();
    });