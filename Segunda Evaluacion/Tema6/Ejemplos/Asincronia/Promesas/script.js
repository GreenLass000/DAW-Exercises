const promesa = new Promise((resolve, reject) => {
    const rand = Math.random();
    console.log(rand)
    if (rand > 0.5) {
        setTimeout(() => {
            resolve("Finalizó correctamente");
        }, 2000);
    } else {
        setTimeout(() => {
            reject(new Error("Ocurrio un error"));
        }, 2000);
    }
});

console.log("Evaluar promesa:");
promesa.then(texto => {
    console.log("1. " + texto);
}).catch(error => {
    console.log("1. " + error);
}).finally(() => {
    console.log("Finalizó totalmente")
});

promesa.then(txt => {
    console.log("2. " + txt);
}).catch(e => {
    console.log("2. " + e);
}).finally(() => {
    console.log("Finalizó totalmente")
});
