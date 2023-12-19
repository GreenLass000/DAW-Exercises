const usuario = {
    name: "Pepe Pérez", username: "pepe", email: "pp@pp.es"
};

const url = 'https://jsonplaceholder.typicode.com/users/2'
const request = new Request(url, {
    method: "PUT", body: JSON.stringify(usuario), headers: {"content-type": "application/json"}
});

fetch(request)
    .then(response => {
        if (!response.ok) {
            throw new Error(response.status);
        }
        console.log(`Se modificó el usuario ${usuario.name}`);
        return response.json();
    })
    .then(datos => console.log(datos))
    .catch(err => {
        console.error(err);
    });