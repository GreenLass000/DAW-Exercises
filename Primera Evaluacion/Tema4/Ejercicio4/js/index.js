let img = document.createElement("img");

let flag = true;

img.src = "resources/mundo.gif";
img.id = "image";

img.style.position = "relative";
img.style.width = "80px";

let extra = document.createElement("img");
extra.id = "extra";
extra.style.width = "80px";

document.body.appendChild(img);
document.body.appendChild(extra);

document.onmousemove = function (e) {
    let i = document.querySelector("#image");
    i.style.left = e.clientX + "px";
    i.style.top = e.clientY + "px";
}

document.onauxclick = function (e) {
    let ext = document.querySelector("#extra");
    if (flag) {
        ext.src = "resources/luna.gif";
        const x = e.clientX - ext.width / 2;
        const y = e.clientY - ext.height / 2;

        ext.style.left = x + "px";
        ext.style.top = y + "px";
    } else {
        ext.src = "resources/sol.png";
    }
}