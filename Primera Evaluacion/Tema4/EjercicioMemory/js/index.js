let items = document.querySelectorAll(".grid-item");
let half = items.length / 2;
let contador = 0;

let used = new Array(items.length).fill(undefined);
console.log(items.length, used)

loadArray();
console.log(used.toString());

items.forEach((item, i) => {
    loadImage(item, i);
});

createBackground();

function loadArray() {
    let flag = true;

    while (used.includes(undefined)) {
        let number;
        do {
            number = ~~(Math.random() * 400);
            flag = checkImage(number);
            console.log("numero");
        } while (used.includes(number) && flag);

        let nPos;
        for (let i = 0; i < 2; i++) {
            do {
                nPos = ~~(Math.random() * used.length);
            } while (used[nPos] !== undefined);
            used[nPos] = number;
        }
    }
}

function checkImage(image) {
    let test = new Image();

    test.onload = function () {
        return true;
    };

    test.onerror = function () {
        return false;
    };
    test.src = `url(https://picsum.photos/id/${image}/200)`;
}

function loadImage(item, index) {
    let image = new Image();
    image.onload = function () {
        item.setAttribute("data-number", `${used[index]}`);
        item.style.backgroundImage = `url(https://picsum.photos/id/${used[index]}/200)`;
    };
    image.src = `https://picsum.photos/id/${used[index]}/200`;
}

function createBackground() {
    let cardDiv = document.createElement("div");
    cardDiv.style.width = "100%";
    cardDiv.style.height = "100%";
    cardDiv.style.borderRadius = "15px";
    cardDiv.style.backgroundImage = "url(./resources/fondo.jpg)";

    items.forEach(card => {
        console.log(card.dataset.number);
        console.log(card);
        let divClone = cardDiv.cloneNode(true);
        card.addEventListener("click", cardClickEvent);
        card.appendChild(divClone);
    });
}

let numbers = [];

function cardClickEvent(event) {
    if (contador >= 2) {
    } else {
        if (event.target.className !== "grid-item") {
            event.target.setAttribute("hidden", true);

            console.log(event.target.parentNode.getAttribute("data-number"))
            numbers.push(event.target.parentNode.getAttribute("data-number"));

            contador++;
        }
        if (contador === 2) {
            console.log(numbers);
            if (numbers[0] === numbers[1]) {
                setTimeout(() => {
                    let selected = document
                        .querySelectorAll("[data-number='" + numbers[0] + "']")

                    selected.forEach(i => {
                        i.style.backgroundImage = "url(./resources/ok.png)"
                    });

                    contador = 0;
                    numbers = [];
                }, 1000);
            } else {
                setTimeout(() => {
                    for (let i = 0; i < numbers.length; i++) {
                        let cards = document.querySelectorAll("[data-number='" + numbers[i] + "']")
                        cards.forEach(card => {
                            if (card.children[0].hasAttribute("hidden")) {
                                card.children[0].removeAttribute("hidden");
                            }
                        });
                    }
                    contador = 0;
                    numbers = [];
                }, 1000);
            }
        }
    }
}