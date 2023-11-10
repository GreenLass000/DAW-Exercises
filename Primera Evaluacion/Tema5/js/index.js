//Formulario
genDOM();

function genDOM() {
    const fieldset = document.createElement("fieldset");
    const legend = document.createElement("legend");
    legend.textContent = "Datos para gráfico";

    const nameText = document.createElement("span");
    nameText.textContent = "Nombre ";
    nameText.classList.add("text");
    const name = document.createElement("input");
    name.type = "text";
    name.id = "name";

    const valueText = document.createElement("span");
    valueText.textContent = "Valor ";
    valueText.classList.add("text");
    const value = document.createElement("input");
    value.type = "range";
    value.min = 0;
    value.max = 500;
    value.step = 2;
    value.id = "value";

    const colorText = document.createElement("span");
    colorText.textContent = "Color ";
    colorText.classList.add("text");
    const color = document.createElement("input");
    color.type = "color";
    color.id = "color";

    const addItem = document.createElement("input");
    addItem.addEventListener("click", addItemClick);
    addItem.type = "button";
    addItem.value = "Nuevo dato";

    fieldset.appendChild(legend);

    fieldset.appendChild(nameText);
    fieldset.appendChild(name);
    fieldset.append(document.createElement("br"));

    fieldset.appendChild(valueText);
    fieldset.appendChild(value);
    fieldset.append(document.createElement("br"));

    fieldset.appendChild(colorText);
    fieldset.appendChild(color);
    fieldset.append(document.createElement("br"));

    fieldset.appendChild(addItem);

    document.body.appendChild(fieldset);
}

// Logica
function addItemClick(e) {
    const name = document.querySelector("#name");
    const value = document.querySelector("#value");
    const color = document.querySelector("#color");

    const json = {value: value.value, color: color.value};

    localStorage.setItem(name.value, JSON.stringify(json));

    name.value = "";
}