/**
 * Realizar un test de 7 preguntas donde cada pregunta tenga 2 botones (verdadero y falso). Si acierta la pregunta se pone la frase en verde, si falla en rojo.
 */

const solutions = ["t", "f", "f", "t", "f", "t", "t"];

/**
 * Funcion que valida si las respuestas son correctas o falsas
 * @param {button} button boton verdadero o falso pulsado
 */
function buttonClick(button) {
  let number = button.id.split("")[0];
  let state = button.id.split("")[1]; //t -> true | f -> false
  let parraph = document.getElementById("p" + number);

  console.log(number, state);

  for (let i = 0; i < solutions.length; i++) {
    if (number == i + 1) {
      console.log(number, state, solutions[i]);
      parraph.style.color = state === solutions[i] ? "green" : "red";
    }
  }
}

//Estos 2 metodos funcionan como un hover de CSS
function mouseOver(button) {
  button.style.backgroundColor = button.value == "Verdadero" ? "lime" : "red";
}

function mouseOut(button) {
  button.style.backgroundColor = "lightgray";
}
