let img = document.createElement("img");

let flag = true;

img.src = "resources/mundo.gif";
img.id = "image";

img.style.position = "relative";
img.style.width = "80px";

let extra = document.createElement("img");
extra.id = "extra";
extra.style.width = "80px";
extra.style.position = "relative";

document.body.appendChild(img);
document.body.appendChild(extra);

document.addEventListener("mousemove", function (e) {
    let i = document.querySelector("#image");
    setXY(e, i);
});

document.addEventListener("auxclick", function (e) {
    if (e.button === 1) {
        e.preventDefault();

        let ext = document.querySelector("#extra");

        ext.src = "resources/" + ((flag) ? "luna" : "sol") + ".gif"
        setXY(e, ext);

        flag = !flag;
    }
});

function setXY(event, element) {
    const x = event.clientX - element.width / 2;
    const y = event.clientY - element.height / 2;

    element.style.left = x + "px";
    element.style.top = y + "px";
}