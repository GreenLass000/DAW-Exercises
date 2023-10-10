export class Vehiculo {
    #pasajeros;

    get pasajeros() {
        return this.#pasajeros;
    }

    set pasajeros(number) {
        this.#pasajeros = number;
    }
}