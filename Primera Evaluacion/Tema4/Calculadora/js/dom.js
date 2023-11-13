const calculator = document.createElement("div");
calculator.classList.add("calculator");

const result_container = document.createElement("div");
result_container.classList.add("result-container");

const result = document.createElement("span");
result.classList.add("result-text");

result_container.appendChild(result);

const grid_container = document.createElement("div");
grid_container.classList.add("grid-container");

const buttons = ["C", "←", "/", "*", "7", "8", "9", "-", "4", "5", "6", "+", "1", "2", "3", "=", "0", "."];

calculator.appendChild(result_container);
calculator.appendChild(grid_container);

document.body.appendChild(calculator);