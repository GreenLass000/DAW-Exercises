/**
 * Generar formulario
 *      - Nombre max 20 caracteres
 *      - nif 7 u 8 numeros + letra mayus
 *      - Edad >= 18 & <= 65
 *      - Fecha alta
 *      - mail \w{3}@\w{3,}.[es, pt, fr]
 *
 * Validar campos
 * Calcular letra dni
 */

const form = document.createElement("form");
form.classList.add("form");
form.id = "myForm";
form.action = "#";
form.method = "post";
form.addEventListener("submit", formSubmitEvent);

newElement("text", "name", ["input-data"], "Nombre", ["error-text"], form, 20);
newElement("text", "nif", ["input-data"], "NIF", ["error-text"], form);
newElement("number", "age", ["input-data"], "Edad", ["error-text"], form);
newElement("date", "date", ["input-data"], "Fecha", ["error-text"], form);
newElement("text", "email", ["input-data"], "eMail", ["error-text"], form);

const send = document.createElement("input")
send.type = "submit";
send.value = "Enviar";

form.appendChild(send);

document.body.appendChild(form);

function newElement(type, name, classes, placeholder, errorClasses, parentForm, minlength = -1) {
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("item-container");

    const item = document.createElement("input")
    item.type = type;
    item.name = name;
    item.classList.add(classes);
    item.placeholder = placeholder;
    item.minLength = (minlength < 0) ? 0 : minlength;
    item.required = true;
    addInputsEventListeners(item);

    const errorItem = document.createElement("div");
    errorItem.classList.add(errorClasses);
    errorItem.textContent = "Mensaje de error de " + placeholder;
    errorItem.hidden = true;

    itemDiv.appendChild(item);
    itemDiv.appendChild(errorItem)
    parentForm.appendChild(itemDiv);
}

function addInputsEventListeners(item) {
    item.addEventListener("focus", validate);
    item.addEventListener("keydown", validate);
    item.addEventListener("blur", validate);
}

function formSubmitEvent(e) {
    e.preventDefault();
}

function submitClick(e) {

    if (true) {
        console.log("");
    } else {
        document.querySelector("#myForm").submit();
    }
}

function validate(e) {
    if (e.type === "focus" || e.type === "keydown") {
        console.log("Evento", e.target.name)
        switch (e.target.name) {
            case "name":
                vName(e.target.parentNode);
                break;
            case "nif":
                vNif(e.target.parentNode);
                break;
            case "age":
                vAge(e.target.parentNode);
                break;
            case "date":
                vDate(e.target.parentNode);
                break;
            case "email":
                vMail(e.target.parentNode);
                break;
        }
    } else if (e.type === "blur" && e.target.textContent.length === 0) {
        e.target.parentNode.childNodes[1].hidden = true;
    }
}

function vName(container) {
    let item = container.childNodes[0];
    let error = container.childNodes[1];

    console.log(item.innerHTML)

    if (item.textContent.length < 20) {
        error.hidden = false;
        error.textContent = "El nombre debe tener minimo 20 caracteres. Actuales: " + item.textContent.length;
    }
}

function vNif(container) {

}

function vAge(container) {

}

function vDate(container) {

}

function vMail(container) {

}