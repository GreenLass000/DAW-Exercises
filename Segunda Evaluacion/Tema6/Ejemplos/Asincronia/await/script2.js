async function f1() {
    const promise = new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("Hecho")
        }, 2000);
    });
    const result = await promise;
    console.log(result);
}

f1();
console.log("¡Fin!");