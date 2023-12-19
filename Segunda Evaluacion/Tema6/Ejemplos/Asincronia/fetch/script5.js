const usuario = {
    name: "Pepe Pérez", username: "pepe", email: "pp@pp.es"
};

const request = {
    method: "POST", body: JSON.stringify(usuario), headers: new Headers()
};

request.headers.append("content-type", "application/json");
fetch('https://jsonplaceholder.typicode.com/users/', request)
    .then(response => {
        if (!response.ok) {
            throw new Error("--> " + response.status);
        }
        console.log(`Se añadió el usuario ${usuario.name}`);
    })
    .catch(err => {
        console.log(err);
    })