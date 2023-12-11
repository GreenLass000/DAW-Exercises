async function funcion_asincrona() {
    return 42;
}

funcion_asincrona().then(v => {
    console.log("El resultado devuelto es:", v);
});