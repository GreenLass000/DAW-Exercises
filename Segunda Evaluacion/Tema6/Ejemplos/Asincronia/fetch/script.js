fetch('https://jsonplaceholder.typicode.com/users')
    .then(response => response.json())
    .then(datos => console.log(datos));