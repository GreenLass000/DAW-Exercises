let spam = ["Mensaje 1", "Mensaje 2", "Mensaje 3", "Mensaje 4", "Mensaje 5", "Mensaje 6"];

let principal = document.getElementById("principal");

start(principal);

function deleteAllElements(item) {
    Array.from(principal.childNodes)
        .forEach(child => {
            principal.removeChild(child);
        });
}

function createElements(item) {
    spam.forEach(text => {
        let div = document.createElement("div");
        div.style.backgroundColor = "rgb(" + random(255) + ", " + random(255) + ", " + random(255) + ")";
        div.textContent = text;
        div.style.width = "150px";
        div.style.height = "45px";
        div.style.position = "absolute";
        div.style.marginTop = random(300 - 45) + "px";
        div.style.marginLeft = random(700 - 150) + "px";

        item.appendChild(div);
    });
}

function start(element) {
    setInterval(e => {
        deleteAllElements(principal);
        createElements(principal);
    }, 1000);
}

function random(max) {
    return Math.random() * max;
}