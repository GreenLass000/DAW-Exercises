let items = document.querySelectorAll(".grid-item");
let half = items.length / 2;

let used = new Array(items.length).fill(undefined);
console.log(used);

items.forEach((item, i) => {
    loadImage(item, i);
});

loadArray();
console.log(used.toString());

function loadArray() {
    /**
     * Genero numero
     * Compruebo que no este en el array
     * Meto el numero en una posicion aleatoria vacia
     * Meto el mismo numero en otra posicion aleatoria vacia
     * Repito hasta llenar el array
     */
    for (let i = 0; i < used.length; i++) {
        let number = ~~(Math.random() * 400);
        while (!used.includes(number)) {
            let rPos = ~~(Math.random() * used.length);
        }
    }
}

function loadImage(item, index) {
    console.log("Imagen generada");
    let random = ~~(Math.random() * 400);
    let imageURL = `https://picsum.photos/id/${random}/200`;
    let image = new Image();

    image.onload = function () {
        item.style.backgroundImage = `url(${imageURL})`;
    };

    image.onerror = function () {
        loadImage(item);
    };

    image.src = imageURL;
}