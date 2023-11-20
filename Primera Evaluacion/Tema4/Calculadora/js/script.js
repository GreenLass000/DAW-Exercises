window.onload = (e) => {
    const buttons = document.querySelectorAll(".grid-item");
    for (const button of buttons) {
        button.addEventListener("click", buttonClick);
    }
}

function buttonClick(e) {
    const text = document.querySelector(".result-text");
    if (isNaN(e.target.textContent)) {
        functionalButtons(e.target.textContent, text);
    } else {
        if (text.textContent === "0") {
            text.textContent = e.target.textContent;
        } else {
            text.textContent += e.target.textContent;
        }
    }
}

let operator = null;
let n1 = null;
let n2 = null;

function functionalButtons(button, result) {
    switch (button) {
        case "C":
            result.textContent = "0";
            glowOperator();
            break;
        case "←":
            if (result.textContent !== "0") {
                if (result.textContent.length === 1) {
                    result.textContent = "0";
                } else {
                    result.textContent = result.textContent.substring(0, result.textContent.length - 1);
                }
            }
            break;
        case "/":
            if (n2 !== null) {
                glowOperator("÷");
                operator = "/";
                n1 = result.textContent;
            }
            break;
        case "*":
            if (n2 !== null) {
                glowOperator("x");
                operator = "*";
                n1 = result.textContent;
            }
            break;
        case "-":
            if (n2 !== null) {
                glowOperator("-");
                operator = "-";
                n1 = result.textContent;
            }
            break;
        case "+":
            if (n2 !== null) {
                glowOperator("+");
                operator = "+";
                n1 = result.textContent;
            }
            break;
        case ".":
            if (!result.textContent.includes(".")) result.textContent += button;
            break;
        case "=":
            break;
    }
}

function glowOperator(operator = "") {
    const checkers = document.querySelectorAll(".checker");
    for (const checker of checkers) {
        checker.classList.remove("checker-glow");
    }
    if (operator !== "") {
        const actual = document.querySelector("div[data-operator='" + operator + "']")
        actual.classList.add("checker-glow");
    }
}