async function f1(string) {
    console.log(`Hacer algo: ${string}`);
    return string;
}

f1("pensar").then(console.log);

async function f2(string) {
    console.log(`Hacer algo: ${string}`);
    return Promise.resolve(string);
}

f2("correr").then(console.log);

const f3 = async string => {
    console.log(`Hacer algo: ${string}`);
    return string;
};

f3("hablar").then(console.log);