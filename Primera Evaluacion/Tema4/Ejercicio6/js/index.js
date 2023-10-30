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

genForm();

function genForm() {
    const form = document.createElement("form");
    form.classList.add("form");
    form.action = "#";
    form.method = "post";

    const name = document.createElement("input")
    name.type = "text";
    name.name = "name";
    name.placeholder = "Nombre";
    name.minLength = 20;
    name.required = true;
    const errorName = document.createElement("div");
    errorName.classList.add("error-text");
    errorName.textContent = "Mensaje de error de Nombre";

    const nif = document.createElement("input")
    nif.type = "text";
    nif.name = "nif";
    nif.placeholder = "NIF";
    nif.required = true;
    nif.pattern = new RegExp("^\d{7,8}[A-Z]$");
    const errorNif = document.createElement("div");
    errorNif.classList.add("error-text");
    errorNif.textContent = "Mensaje de error de NIF";

    const age = document.createElement("input")
    age.type = "number";
    age.name = "age";
    age.placeholder = "Edad";
    age.required = true;
    const errorAge = document.createElement("div");
    errorAge.classList.add("error-text");
    errorAge.textContent = "Mensaje de error de Edad";

    const date = document.createElement("input")
    date.type = "date";
    date.name = "date";
    date.minLength = 20;
    date.required = true;
    const errorDate = document.createElement("div");
    errorDate.classList.add("error-text");
    errorDate.textContent = "Mensaje de error de Fecha";

    const mail = document.createElement("input")
    mail.type = "email";
    mail.name = "nif";
    mail.placeholder = "eMail";
    mail.minLength = 20;
    mail.required = true;
    mail.pattern = new RegExp("^\w{3}[@]\w{3,}[.](?:es|pt|fr)$");
    const errorMail = document.createElement("div");
    errorMail.classList.add("error-text");
    errorMail.textContent = "Mensaje de error de Mail";

    const send = document.createElement("input")
    send.type = "submit";
    send.value = "Enviar";

    form.appendChild(name);
    form.appendChild(errorName);

    form.appendChild(nif);
    form.appendChild(errorNif);

    form.appendChild(age);
    form.appendChild(errorAge);

    form.appendChild(date);
    form.appendChild(errorDate);

    form.appendChild(mail);
    form.appendChild(errorMail);

    form.appendChild(send);

    document.body.appendChild(form);
}

function validate(item) {

}

function vDni(dni, err) {

}

function vName(name, err) {

}

function vAge(age, err) {

}

function vDate(date, err) {

}

function vMail(email, err) {

}