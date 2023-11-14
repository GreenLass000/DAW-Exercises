const calculator = document.createElement("div");
calculator.classList.add("calculator");

const result_container = document.createElement("div");
result_container.classList.add("result-container");

const result = document.createElement("span");
result.textContent = "0";
result.classList.add("result-text");

const operatorsChecker = document.createElement("div");
operatorsChecker.classList.add("operator-container");

const operators = ["+", "-", "x", "÷"];
for (const operator of operators) {
    const checker = document.createElement("div");
    checker.classList.add("checker");
    checker.dataset.operator = operator;
    checker.textContent = operator;
    operatorsChecker.appendChild(checker);
}
result_container.appendChild(operatorsChecker);
result_container.appendChild(result);

const grid_container = document.createElement("div");
grid_container.classList.add("grid-container");

const buttons = ["C", "←", "/", "*", "7", "8", "9", "-", "4", "5", "6", "+", "1", "2", "3", "=", "0", "."];
for (const button of buttons) {
    const b = document.createElement("div");
    b.dataset.value = button;
    b.classList.add("grid-item");
    b.textContent = button;
    grid_container.appendChild(b);
}

calculator.appendChild(result_container);
calculator.appendChild(grid_container);

document.body.appendChild(calculator);