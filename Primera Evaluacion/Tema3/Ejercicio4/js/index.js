const persona = {
    nombre: "Pepe",
    apellidos: ["García", "Pérez"],
    edad: 23
};

const {nombre: ej1, edad: ej2} = persona;
console.log(`Nombre: ${ej1} - Edad: ${ej2}`);

// -----------------------------------------------------------------

const arr = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];

const [lu, , mi] = arr;
console.log(lu, mi);

// -----------------------------------------------------------------

const {apellidos: [apellido1, apellido2]} = persona;
console.log(`Apellidos: ${apellido1}, ${apellido2}`);

// -----------------------------------------------------------------

const animal = {
    raza: "Anaconda",
    nombre: "Perro",
    color: "rosa"
};

function verDatos({nombre = "Luis", edad = 20}) {
    return `Nombre: ${nombre} - Edad: ${edad}`;
}

console.log(verDatos(persona));
console.log(verDatos(animal));