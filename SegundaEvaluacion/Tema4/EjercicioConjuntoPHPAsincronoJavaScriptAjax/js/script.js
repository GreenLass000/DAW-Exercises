window.onload = genButtons;

function genButtons() {
    const list = document.createElement("input");
    list.type = "button";
    list.value = "Cargar Lista";
    list.onclick = loadList;

    const update = document.createElement("input");
    update.type = "button";
    update.value = "Actualizar Valores";
    update.onclick = updateList;

    document.body.appendChild(list);
    document.body.appendChild(update);
}

function loadList(e) {
    fetch("../controller/list.php")
        .then(response => response.json())
        .then()
}

function updateList(e) {

}

function updateValue() {

}

function updateActions() {

}