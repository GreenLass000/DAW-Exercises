function Figura(x, y, color, tipo) {
    this.x = x;
    this.y = y;
    this.color = color;
    this.tipo = tipo;
    this.moverA = function (newX, newY) {
        this.x = newX;
        this.y = newY;
    };
}

Figura.prototype.toString = function () {
    return `${this.tipo} ${this.color}`;
}
