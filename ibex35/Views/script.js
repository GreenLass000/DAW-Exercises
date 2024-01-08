let monedero = 100;

function cargarLista() {
    checkCargarLista();
    let tabla = createElement("table", undefined, undefined);
    tabla.id = "tablaValores";
    let trHeader = createElement("tr", undefined, undefined);

    let contents = ["Orden", "Alias", "Nombre", "Año", "Valor", "Compradas"];

    for (const content of contents) {
        let td = createElement("td", undefined, content);
        trHeader.appendChild(td);
    }

    let contador = 1;
    fetch("../Controllers/GetActivos.php")
        .then(response => response.json())
        .then(datos => {
            datos.forEach(valor => {
                let tr = createElement("tr", undefined, undefined);

                for (let i = 0; i < valor; i++) {
                    let td = createElement("td", (i === 4) ? "valor" : ((i === 5) ? "compradas" : undefined), contador);
                    tr.appendChild(td);
                }

                let inputComprada = createElement("input", undefined, undefined);
                inputComprada.type = "number";
                inputComprada.min = 1;
                inputComprada.max = 100;

                tr.insertAdjacentElement("beforeend", inputComprada);

                let buttonComprar = createElement("input", undefined, undefined);
                buttonComprar.value = "comprar";
                buttonComprar.type = "button";
                buttonComprar.addEventListener("click", (e) => {
                    e.preventDefault();
                    cambiarCompradas(inputComprada.value, valor[0], valor[4], true, valor[3]);
                });
                tr.insertAdjacentElement("beforeend", buttonComprar);

                let buttonVender = createElement("input", undefined, undefined);
                buttonVender.value = "vender";
                buttonVender.type = "button";

                buttonVender.disabled = valor[4] === 0;
                buttonVender.addEventListener("click", (e) => {
                    e.preventDefault();
                    cambiarCompradas(inputComprada.value, valor[0], valor[4], false, valor[3]);
                });
                tr.insertAdjacentElement("beforeend", buttonVender);
                contador++;
                tabla.insertAdjacentElement("beforeend", tr);
            })
        });
    document.body.insertAdjacentElement("beforeend", tabla);
}

function createElement(type, classname, content) {
    let element = document.createElement(type);
    if (classname !== undefined) {
        element.className = classname;
    }
    if (content !== undefined) {
        element.textContent = content;
    }
    return element;
}

function cargarElementos() {
    sumaValores();
    let cargarListaButton = createElement("input", "boton", undefined);
    let actualizarValoresButton = createElement("input", "boton", undefined);
    let monederoDiv = createElement("div", undefined, "Monedero: " + monedero + "€");
    document.body.insertAdjacentElement("beforeend", monederoDiv);
    cargarListaButton.type = "button";
    cargarListaButton.value = "Cargar lista";
    cargarListaButton.addEventListener("click", (e) => {
        e.preventDefault();
        cargarLista();
    });
    actualizarValoresButton.type = "button";
    actualizarValoresButton.value = "Actualizar valores";
    actualizarValoresButton.addEventListener("click", (e) => {
        e.preventDefault();
        actualizarValores();
    });
    document.body.insertAdjacentElement("beforeend", cargarListaButton);
    document.body.insertAdjacentElement("beforeend", actualizarValoresButton);
    actualizarValor();
}

function sumaValores() {
    fetch('../Controllers/GetSumaValores.php')
        .then(response => response.json())
        .then(datos => {
            let div = document.querySelector("#suma");
            if (div == null) {
                let div = createElement("div", undefined, undefined);
                div.id = "suma";
                div.textContent = "Suma:" + datos.toFixed(2);
                document.body.insertAdjacentElement("afterbegin", div);
            } else {
                div.textContent = "Suma:" + datos.toFixed(2);
            }
        });
}

function checkCargarLista() {
    let tabla = document.querySelector("#tablaValores");
    if (tabla != null) {
        tabla.remove();
    }
}

function checkActualizarValores() {
    let tabla = document.querySelector("#tablaValores");
    if (tabla == null) {
        cargarLista();
        return true;
    }
    return false;
}

function actualizarValores() {
    sumaValores();
    if (!checkActualizarValores()) {
        fetch('../Controllers/GetValores.php')
            .then(response => response.json())
            .then(datos => {
                let arrayValores = Array.from(document.querySelectorAll(".valor"));
                arrayValores.forEach(elemento => {
                    elemento.textContent = datos[arrayValores.indexOf(elemento)];
                });
            })
    }
}

cargarElementos();

function actualizarValor() {
    let select = createElement("select", undefined, undefined);
    select.id = "select";
    fetch('../Controllers/GetAlias.php')
        .then(response => response.json())
        .then(datos => {
            datos.forEach(alias => {
                let option = createElement("option", undefined, undefined);
                option.textContent = alias;
                option.value = alias;
                select.insertAdjacentElement("beforeend", option);
            })
        });
    document.body.insertAdjacentElement("beforeend", select);
    let input = createElement("input", undefined, undefined);
    input.placeholder = "nuevo valor";
    input.id = "inputValor";
    input.style.width = "70px";
    document.body.insertAdjacentElement("beforeend", input);
    let buttonValor = createElement("input", undefined, undefined);
    buttonValor.type = "button";
    buttonValor.value = "Actualizar valor";
    buttonValor.addEventListener("click", (e) => {
        e.preventDefault();

        let params = {
            method: "POST",
            body: JSON.stringify({alias: select.value, valor: input.value}),
            headers: {"Content-type": "application/json;charset=UTF-8"}
        };
        if (input.value != "") {
            fetch('../Controllers/SetValor.php', params)
                .then(response => response.json())
                .then(datos => {

                });
        }
        actualizarValores();
    });
    document.body.insertAdjacentElement("beforeend", buttonValor);
}

/*function actualizarCompradas() {
    fetch('../Controllers/GetCompradas.php')
        .then(response => response.json())
        .then(datos => {
            let arrayValores = Array.from(document.querySelectorAll(".compradas"));
            arrayValores.forEach(elemento => {
                elemento.textContent = datos[arrayValores.indexOf(elemento)];
            });
        })
}*/

async function cambiarCompradas(input, alias, compradas, compra, valor) {
    if (input > 0 && input <= 100) {
        //compra=true; significa venir de comprar
        //compra=false; significa venir de vender
        if (!compra) {
            if (compradas >= input) {
                compradas = compradas - input;
            }
        } else {
            compradas += Number.parseInt(input);
        }
        let params = {
            method: "POST",
            body: JSON.stringify({alias: alias, compradas: compradas}),
            headers: {"Content-type": "application/json;charset=UTF-8"}
        };
        //las acciones las voy a pasar por post para evitar tocar la url
        fetch('../Controllers/SetCompradas.php', params)
            .then(response => response.json());
        await cargarLista();
    }
}

function monederoComprobacion(input, valor, compra) {
    let cantidad = input * valor;

    if (!compra) {
        if (cantidad <= monedero) {
            cantidad = cantidad * -1;
            monedero += Number.parseFloat(cantidad);
        }
    } else {
        monedero = monedero + cantidad;
    }
}