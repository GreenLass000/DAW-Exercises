let items = document.querySelectorAll(".grid-item");
let half = items.length / 2;

let used = new Array(items.length);
console.log(used);

for (let i = 0; i < half; i++) {

}

items.forEach((item) => {
    loadImage(item);
});

function loadImage(item) {
    console.log("Imagen generada");
    let randomID = ~~(Math.random() * 400);
    let imageURL = `https://picsum.photos/id/${randomID}/200`;
    let image = new Image();

    image.onload = function () {
        item.style.backgroundImage = `url(${imageURL})`;
    };

    image.onerror = function () {
        loadImage(item);
    };

    image.src = imageURL;
}