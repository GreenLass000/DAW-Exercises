fetch('https://jsonplaceholder.typicode.com/users')
    .then(response => {
        for (const [key, value] of response.headers) {
            console.log(`${key} -> ${value}`);
        }
        return response.json();
    })
    .then(datos => console.log(datos));