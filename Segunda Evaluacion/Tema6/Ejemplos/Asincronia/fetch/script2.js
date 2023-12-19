fetch('https://jsonplaceholder.typicode.com/users')
    .then(response => {
        console.log(response.ok);
        console.log(response.status);
        console.log(response.statusText);
    });