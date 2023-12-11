const numeros = new Promise((resolve, reject) => {
    const array = [2, 4, 5, 6];
    if (array.length === 0) {
        reject(new Error("No hay elementos"));
    }
    setTimeout(() => {
        resolve(array)
    }, 1000);
});

numeros.then(a => {
    console.log(a.length);
    return numeros;
}).then(a => {
    console.log(Math.min(...a));
}).catch(e => {
    console.log(e);
});