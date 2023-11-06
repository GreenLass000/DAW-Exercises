const container = document.createElement("div");
container.classList.add("grid-container");

for (let i = 0; i < 9; i++) {
    const item = document.createElement("div");
    item.classList.add("grid-item");
    item.classList.add("item" + i);

    container.appendChild(item);
}

const pieces = document.createElement("div")
pieces.classList.add("pieces-container");
pieces.id = "pieces";

document.body.appendChild(container);
document.body.appendChild(pieces);

