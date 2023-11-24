const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        document.querySelector(".container").innerHTML = xhr.response;
    }
});

document.querySelector("#btn")
    .addEventListener("click", () => {
        xhr.open("get", "http://localhost:63342/" + encodeURIComponent("Segunda Evaluacion") + "/Tema6/Ejemplos/Ejemplo1/datos.txt");
        xhr.send();
    });