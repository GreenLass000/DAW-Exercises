const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        const img = document.querySelector("#img");
        img.src = URL.createObjectURL(xhr.response);
    }
});

document.querySelector("#btn")
    .addEventListener("click", () => {
        const uriComponent = encodeURIComponent("Segunda Evaluacion");
        xhr.open("get", `http://localhost:63342/${uriComponent}/Tema6/Ejemplos/Ejemplo3/sol.jpg`);
        xhr.responseType = "blob";
        xhr.send();
    });