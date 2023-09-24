const textEsp = "Bienvenido";
const textEng = "Welcome";
const textIt = "Benvenuto";

const buttonEsp = ["Español", "Inglés", "Italiano"];
const buttonEng = ["Spanish", "English", "Italian"];
const buttonIt = ["Spagnolo", "Inglese", "Italiano"];

function buttonEventHandler(event) {
    let button = event.target;

    if (event.type === "click") {
        changeButtonLang();
        let pText = document.getElementById("text")

        console.log(pText, button.id)

        if (button.id == "esp") {
            pText.innerHTML = textEsp;
            pText.style.color = "red";

        } else if (button.id == "eng") {
            pText.innerHTML = textEng;
            pText.style.color = "blue";

        } else if (button.id == "it") {
            pText.innerHTML = textIt;
            pText.style.color = "green";
        }
    } else {
        changeButtonBackgroundImage(event, button);
    }
}

function changeButtonLang() {
    let buttons = divButtons.getElementsByTagName("button");

    for (let i = 0; i < buttons.length; i++) {
        if (buttons[i].id === "esp") {

        }
    }
}