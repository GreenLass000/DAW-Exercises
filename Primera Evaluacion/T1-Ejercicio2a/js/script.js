/**
 * Diseñar una web con 3 botones para que al pulsarlos se genere un mensaje de bienvenida en español, ingles e italiano.
 * El mensaje irá en un párrafo (<p>). Cada mensaje debe de tener un color diferente según el idoma
 */

const pEsp = "Esta es una frase en español";
const pEng = "This is a phrase in english";
const pIt = "Questa è una frase in italiano";

const bEsp = ["Español", "Inglés", "Italiano"];
const bEng = ["Spanish", "English", "Italian"];
const bIt = ["Spagnolo", "Inglese", "Italiano"];

// const espFlag =
//   "https://img.asmedia.epimg.net/resizer/LQyBk5T2TfVttC_yVM8n5HuEYpM=/1472x828/cloudfront-eu-central-1.images.arcpublishing.com/diarioas/53YSJXSIZFHNTBV52Z4AMKISUM.png";
// const engFlag =
//   "https://turismo.org/wp-content/uploads/2010/09/Bandera-del-Reino-Unido-760x400.png";
// const itFlag =
//   "https://www.google.com/url?sa=i&url=https%3A%2F%2Fes.m.wikipedia.org%2Fwiki%2FArchivo%3AFlag_of_Italy.svg&psig=AOvVaw1kZ3yhzIUZAWDY8AoQQFUn&ust=1695459327947000&source=images&cd=vfe&opi=89978449&ved=0CA4QjRxqFwoTCNCGvKzRvYEDFQAAAAAdAAAAABAH";

/**
 * Cambia el idioma del parrafo dependiendo del idioma que se elija con los botones
 * @param {button} button Boton que contiene la informacion del idioma al que se va a cambiar el párrafo
 */
function changeLang(button) {
  let phrase = document.getElementById("phrase");
  switch (button.id) {
    case "es":
      phrase.innerHTML = pEsp;
      phrase.style.color = "blue";
      break;
    case "en":
      phrase.innerHTML = pEng;
      phrase.style.color = "green";
      break;
    case "it":
      phrase.innerHTML = pIt;
      phrase.style.color = "pink";
  }
  changeButtonLang(button.id);
}

/**
 * Cambia el idioma de los botones
 * @param {string} lang idioma al que se cambiarán los botones
 */
function changeButtonLang(lang) {
  let esp = document.getElementById("es");
  let eng = document.getElementById("en");
  let it = document.getElementById("it");

  let buttonLangs;

  switch (lang) {
    case "es":
      buttonLangs = bEsp;
      break;
    case "en":
      buttonLangs = bEng;
      break;
    case "it":
      buttonLangs = bIt;
  }

  esp.value = buttonLangs[0];
  eng.value = buttonLangs[1];
  it.value = buttonLangs[2];
}

// let flag = document.getElementById("flag");
// function buttonOver(button) {
//   switch (button.id) {
//     case "es":
//       flag.src = espFlag;
//       break;
//     case "en":
//       flag.src = engFlag;
//       break;
//     case "it":
//       flag.src = itFlag;
//   }
// }

// function buttonOut(button) {
//   flag.src = "";
// }
