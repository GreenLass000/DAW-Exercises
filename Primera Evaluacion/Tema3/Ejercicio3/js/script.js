import {Turismo} from "./models/Turismo.js";
import {Camion} from "./models/Camion.js";

let vehiculos = [];

function capturaReloj() {
    let date = new Date();
    let hours = (date.getHours() < 10) ? "0" + date.getHours() : date.getHours();
    let minutes = (date.getMinutes() < 10) ? "0" + date.getMinutes() : date.getMinutes();
    let seconds = (date.getSeconds() < 10) ? "0" + date.getSeconds() : date.getSeconds();

    return `${hours}:${minutes}:${seconds}`;
}

function generarVehiculos() {
    //Generacion de turismos
    const COLORS = ["blue", "red", "green"];
    const MIN_MAX_TURISMOS = [1, 4];
    const MIN_MAX_TURISMO_PASSENGERS = [1, 7];

    createAndAdd(getRandomNumber(MIN_MAX_TURISMOS), getRandomNumber(MIN_MAX_TURISMO_PASSENGERS), COLORS, Turismo);

    //Generacion de Camiones
    const MIN_MAX_CAMIONES = [1, 4];
    const TARA = [0, 9999];
    const MIN_MAX_CAMION_PASSENGERS = [1, 7];

    createAndAdd(getRandomNumber(MIN_MAX_CAMIONES), getRandomNumber(MIN_MAX_CAMION_PASSENGERS), TARA, Camion);
}

function createAndAdd(num, passengers, arr, instance) {
    for (let i = 0; i < num; i++) {
        let v;
        if (instance.prototype.constructor.name === "Turismo") {
            v = new Turismo(arr[~~(Math.random() * arr.length)])
        } else if (instance.prototype.constructor.name === "Camion") {
            v = new Camion(getRandomNumber(arr));
        }

        v.pasajeros = passengers;
        v.hora = capturaReloj();

        vehiculos.push(v);
    }
}

function mostrarVehiculos() {
    let html = "<table border='1'>";
    for (let vehiculo of vehiculos) {
        html += "<tr><td>Hora: " + vehiculo.hora + "</td>" +
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