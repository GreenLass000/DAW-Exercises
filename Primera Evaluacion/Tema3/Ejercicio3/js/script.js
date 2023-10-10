import {Turismo} from "./models/Turismo.js";
import {Camion} from "./models/Camion.js";

let vehiculos = [];

function capturaReloj() {
    let date = new Date();
    return `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
}

function generarVehiculos() {
    //Generacion de turismos
    const COLORS = ["blue", "red", "green"];
    const MIN_MAX_TURISMOS = [1, 4];
    const MIN_MAX_TURISMO_PASSENGERS = [1, 7];

    let randomTurismos = getRandomNumber(MIN_MAX_TURISMOS);

    for (let i = 0; i < randomTurismos; i++) {
        let randomPassengers = getRandomNumber(MIN_MAX_TURISMO_PASSENGERS);

        let t = new Turismo(COLORS[~~(Math.random() * COLORS.length)]);
        t.pasajeros = randomPassengers;
        t.hora = capturaReloj();

        vehiculos.push(t);
    }

    //Generacion de Camiones
    const MIN_MAX_CAMIONES = [1, 4];
    const TARA = [0, 9999];
    const MIN_MAX_CAMION_PASSENGERS = [1, 7];

    let randomCamiones = getRandomNumber(MIN_MAX_CAMIONES);

    for (let i = 0; i < randomCamiones; i++) {
        let randomPassengers = getRandomNumber(MIN_MAX_CAMION_PASSENGERS);
        let tara = getRandomNumber(TARA);

        let c = new Camion(tara);
        c.pasajeros = randomPassengers;
        c.hora = capturaReloj();

        vehiculos.push(c);
    }
}

function mostrarVehiculos() {
    let html = "<table border='1'>";
    for (let vehiculo of vehiculos) {
        html += "<tr><td>" + vehiculo.hora + "</td>" +
            "<td>Tipo: " + vehiculo.constructor.name + "</td>" +
            "<td>Pasajeros: " + vehiculo.pasajeros + "</td>";
        if (vehiculo.constructor.name === "Turismo") {
            html += "<td  bgcolor='" + vehiculo.color + "'>Color: " + vehiculo.color + "</td>"
        } else {
            html += "<td>Tara: " + vehiculo.tara + "</td>"
        }
        html += "</tr>";
    }
    html += "</table>";

    document.body.innerHTML = html;
}

function getRandomNumber(arr) {
    return ~~(Math.random() * (arr[1] - arr[0]) + arr[0]);
}

let cont = 0;
const id = setInterval(() => {

    capturaReloj();
    generarVehiculos();
    mostrarVehiculos();
    if (cont++ === 10) {
        clearInterval(id);
    }
}, 2000);