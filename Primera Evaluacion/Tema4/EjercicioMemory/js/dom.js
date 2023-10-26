let side = 20;

let gridContainer = document.createElement("div");
gridContainer.className = "grid-container";
gridContainer.style.display = "grid";
gridContainer.style.gridTemplateColumns = getGridColumns();
gridContainer.style.gap = "10px";
gridContainer.style.padding = "10px";
gridContainer.style.textAlign = "center";
gridContainer.style.justifyContent = "center";

let area = ((side < 2) ? 2 : side) ** 2;
for (let i = 0; i < area; i++) {
    let item = document.createElement("div");
    item.className = "grid-item";
    item.id = i;
    item.style.width = "200px";
    item.style.height = "200px";
    item.style.backgroundColor = "lightgray";
    item.style.borderRadius = "15px";
    item.style.border = "1px solid gray";

    gridContainer.appendChild(item);
}

let cont = document.createElement("div");

let text = document.createElement("div");
cont.style.textAlign = "center";
cont.textContent = "Parejas Encontradas: ";
cont.style.fontSize = "30px";

let points = document.createElement("div");
points.id = "points";
points.style.fontSize = "30px";
points.textContent = "0";

cont.appendChild(text);
cont.appendChild(points);

document.body.appendChild(cont);
document.body.appendChild(gridContainer);

function getGridColumns() {
    let autos = [];
    for (let i = 0; i < ((side < 2) ? 2 : side); i++) {
        autos.push("auto");
    }
    return autos.join(" ");
}