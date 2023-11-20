// let variable;
//
// var variable2;
//
// const variable3 = 0;
//
// let array = [];
//
// let array2 = Array(12).fill(Math.floor(Math.random() * 10 + 1));
// console.log(array2);
//
// console.log(typeof variable3);
//
// while (false) {
// }
//
// do {
// } while (false);
//
// for (; false;) {
// }
//
// array2.forEach(item => {
//
// });
//
// for (const array2Element of array2) {
//
// }
//
// for (const array2Key in array2) {
//
// }
//
//
// function algo(uno, dos, tres, ...cuatro) {
//
// }
//
// let ar = [1, 2, 3];
// let arr2 = [4, 5, 6];
// let arr3 = [...ar, 4];
// console.log(arr3);
//
// function a(a, b, c) {
//
// }
//
// a(...ar);
//
// let animal = {
//     raza: "algo", edad: 32, color: "esperanza", patas: 1
// }
//
// animal.edad = 33;
//
// console.log(animal.edad);
// console.log(animal["edad"]);
//
// animal.pico = "pepe";
//
// class Animal {
//
//     #hola;
//
//     constructor() {
//     }
//
//     get hola() {
//
//     }
//
//     set hola(algo) {
//
//     }
//
//     validar() {
//
//     }
//
// }
//
//
// // setInterval(() => {
// //     console.log("Hola");
// // }, 100);
//
// setTimeout(() => {
//     console.log("Adios")
// }, 10000);
//

const items = document.querySelectorAll(".item");
console.log(items);

for (const item of items) {
    item.innerHTML = "<table border='1'><tr><td>1</td><td>1</td></tr></table>";
}

const link = document.createElement("a");
link.classList.add("link");
link.textContent = "Hazme Click";
link.href = "www.google.com";
link.target = "_blank";

document.body.appendChild(link);






























































































































































































