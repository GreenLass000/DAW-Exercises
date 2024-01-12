const xhr = new XMLHttpRequest();
xhr.addEventListener("load", (e) => {
    if (xhr.status === 200) {
        document.querySelector("#resources").innerHTML += "<img width='300' src=" + encodeURIComponent(xhr.responseText) + ">";
    } else {
        alert(`Error: [${xhr.status}] ${xhr.statusText}`);
    }
});

document.forms[0].addEventListener("submit", (e) => {
    e.preventDefault();
    xhr.open("POST", "http://localhost:8080/Ejercicio2/RecibirFichero.php");
    xhr.send(new FormData(document.forms[0]));
});