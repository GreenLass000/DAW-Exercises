let tablero = [];
const FIGURASW = [];
const FIGURASB = [];

genTablero();

fillPiezas(FIGURASW, 8, "P", "White");
fillPiezas(FIGURASW, 2, "T", "White");
fillPiezas(FIGURASW, 2, "C", "White");
fillPiezas(FIGURASW, 2, "A", "White");
fillPiezas(FIGURASW, 1, "Q", "White");
fillPiezas(FIGURASW, 1, "K", "White");

fillPiezas(FIGURASB, 8, "P", "Black");
fillPiezas(FIGURASB, 2, "T", "Black");
fillPiezas(FIGURASB, 2, "C", "Black");
fillPiezas(FIGURASB, 2, "A", "Black");
fillPiezas(FIGURASB, 1, "Q", "Black");
fillPiezas(FIGURASB, 1, "K", "Black");

colocarPiezas(FIGURASW, tablero);
colocarPiezas(FIGURASB, tablero);

function colocarPieza(figura, tablero) {

    let x = ~~(Math.random() * 8);
    let y = ~~(Math.random() * 8);

    figura.moverA(x, y);

    if (tablero[figura.y][figura.x] === 0) {
        tablero[figura.y][figura.x] = figura.toString();
    } else {
        colocarPieza(figura, tablero);
    }

    /*tablero[posY][posX] = tablero[posY][posX] === 0 ?
        figura.toString() : colocarPieza(figura, tablero);*/
}

function colocarPiezas(figuras, tablero) {
    for (let figura of figuras) {
        colocarPieza(figura, tablero)
    }
}

function fillPiezas(arr, number, type, color) {
    for (let i = 0; i < number; i++) {
        let x = ~~(Math.random() * 8);
        let y = ~~(Math.random() * 8);
        arr.push(new Figura(x, y, color, type));
    }
}

function genTablero() {
    for (let i = 0; i < 8; i++) {
        tablero[i] = [];
        for (let j = 0; j < 8; j++) {
            tablero[i][j] = 0;
        }
    }
}

console.table(tablero);