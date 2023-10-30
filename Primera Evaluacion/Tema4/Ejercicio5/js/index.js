const GAME_LENGTH = 5;
let numbers = genNumbers(GAME_LENGTH);
fillDocument();

function genNumbers(lenght) {
    let arr = [];
    for (let i = 0; arr.length < lenght; i++) {
        let rand = ~~(Math.random() * 99);
        if (!arr.includes(rand)) arr.push(rand)
    }
    return arr;
}

function fillDocument() {
    const container = document.createElement("div");
    container.id = "game-container";

    numbers.forEach(number => {
        const item = document.createElement("div");
        item.textContent = number;
        item.classList.add("game-item");
        item.draggable = true;

        addEventListeners(item);
        container.appendChild(item);
    });
    document.body.appendChild(container);
}

function addEventListeners(element) {

}