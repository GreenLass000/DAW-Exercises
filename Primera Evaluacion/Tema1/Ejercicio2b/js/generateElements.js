let divParraph = document.getElementById("text");
let divButtons = document.getElementById("buttons");

const langs = ["Español", "Inglés", "Italiano"];
const ids = ["esp", "eng", "it"];
const buttonCount = langs.length;

// Añadir p
let newP = document.createElement("p");
let timeout;
let newText;

newP.id = "parraph";
newP.innerHTML = "Bienvenido";
newP.style.color = "red";

// Código para cambiar el texto del parrafo, no sirve si no hay traduccion a tiempo real
// newP.addEventListener("mousedown", function (e) {
//     timeout = setTimeout(function () {
//         newText = prompt("Escribe el texto para cambiar el párrafo:");
//         newP.innerHTML = newText;
//     }, 500);
// });
// newP.addEventListener("mouseup", function (e) {
//     clearTimeout(timeout);
// })

divParraph.appendChild(newP);

// Añadir botones
for (let i = 0; i < buttonCount; i++) {
    let newButton = document.createElement("button");
    newButton.innerHTML = langs[i];

    newButton.id = ids[i]

    newButton.onclick = buttonEventHandler;
    newButton.onmouseover = buttonEventHandler;
    newButton.onmouseout = buttonEventHandler;

    divButtons.appendChild(newButton);
}