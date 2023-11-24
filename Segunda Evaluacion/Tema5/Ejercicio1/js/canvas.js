window.addEventListener("storage", updateCanvas);
window.addEventListener("load", updateCanvas);

const canvas = document.createElement("canvas");
canvas.id = "canvas";
canvas.width = 800;
canvas.height = 800;
canvas.style.backgroundColor = "lightgray";

document.body.appendChild(canvas);

let ctx;
let c = document.querySelector("#canvas");

if (c.getContext) {
    ctx = c.getContext("2d");
} else {
    document.body.textContent = "Tu navegador no soporta canvas";
}

function updateCanvas(e) {
    const ls = localStorage;
    const height = 25;
    const width = 150;
    const RESET = "#000";

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < ls.length; i++) {
        ctx.beginPath();
        ctx.rect(0, i * height, width, height);
        ctx.stroke();
        ctx.font = "18px Arial";
        ctx.fillText(ls.key(i), 10, height + i * height - (height / 4), width);

        const data = JSON.parse(ls.getItem(ls.key(i)));

        ctx.beginPath();
        ctx.fillStyle = data.color;
        ctx.fillRect(width, i * height, data.value, height);
        ctx.fillStyle = RESET;
    }
}