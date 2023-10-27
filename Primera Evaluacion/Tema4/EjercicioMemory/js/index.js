let items = document.querySelectorAll(".grid-item");
let contador = 0;

let used = new Array(items.length).fill(undefined);

// console.log(items.length, used)

loadArray();
// console.log(used.toString());

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
            // console.log("numero");
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
    let loadFlag;

    test.addEventListener("load", loadEvent);

    function loadEvent(e) {
        console.log(e.headers)
        loadFlag = false;
    }

    test.onerror = function (e) {
        e.preventDefault();
        return true;
    };
    test.src = `url(https://picsum.photos/200)`;
    console.log(test.src);
    // return 0;
}

function loadImage(item, index) {
    let image = new Image();
    image.addEventListener("load", () => {
        item.dataset.numero = used[index];
        //item.setAttribute("data-number", `${used[index]}`);
        item.style.backgroundImage = `url(https://picsum.photos/id/${used[index]}/200)`;
    });
    image.addEventListener("error", (e) => {
        e.preventDefault();
        item.style.backgroundColor = "red";
        item.id = "error";
    })
    image.src = `https://picsum.photos/id/${used[index]}/200`;
}

function createBackground() {
    let cardDiv = document.createElement("div");
    cardDiv.style.width = "100%";
    cardDiv.style.height = "100%";
    cardDiv.style.borderRadius = "15px";
    //cardDiv.style.backgroundImage = "url(./resources/fondo.jpg)";

    // let datasetCards = document.querySelectorAll("[data-numero]")
    // console.log(datasetCards);
    items.forEach(card => {
        // console.log("El dataset es", card.dataset.numero);
        // console.log(card);
        if (card.dataset.numero === undefined) {
            let divClone = cardDiv.cloneNode(true);
            card.addEventListener("click", cardClickEvent);
            card.appendChild(divClone);
        }
    });
}

let numbers = [];

function cardClickEvent(event) {
    if (contador >= 2) {
    } else {
        if (event.target.className !== "grid-item") {
            event.target.setAttribute("hidden", true);

            console.log(event.target.parentNode.dataset.numero)
            numbers.push(event.target.parentNode.dataset.numero);

            contador++;
        }
        if (contador === 2) {
            // console.log(numbers);
            if (numbers[0] === numbers[1]) {
                setTimeout(() => {
                    let selected = document
                        .querySelectorAll("[data-numero='" + numbers[0] + "']")

                    selected.forEach(i => {
                        i.style.backgroundImage = "url(./resources/ok.png)"
                    });

                    let points = document.querySelector("#points");
                    points.textContent = parseInt(points.textContent) + 1;

                    checkWin();

                    contador = 0;
                    numbers = [];
                }, 1000);
            } else {
                setTimeout(() => {
                    for (let i = 0; i < numbers.length; i++) {
                        let cards = document.querySelectorAll("[data-numero='" + numbers[i] + "']")
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

function checkWin() {
    let cardCont = 0;
    let items = document.querySelectorAll(".grid-item");
    items.forEach(item => {
        if (item.children[0].getAttribute("hidden") || item.children[0] === undefined)
            cardCont++;
    });
    if (cardCont === 16) {
        document.body.appendChild("<h1>HAS GANADO</h1>");
    }
}