import {Vehiculo} from "./Vehiculo.js";

export class Turismo extends Vehiculo {
    #color;

    constructor(color) {
        super();
        this.#color = color;
    }

    get color() {
        return this.#color;
    }

    set color(color) {
        this.#color = color;
    }
}