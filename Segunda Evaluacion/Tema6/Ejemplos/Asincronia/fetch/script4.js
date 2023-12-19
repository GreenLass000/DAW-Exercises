fetch('https://jsonplaceholder.typicode.com/users/', {
    method: "POST",
    headers: {"content-type": "application/json"},
    body: JSON.stringify({
        name: "new",
        username: "new user",
        email: "nu@nu.es"
    })
})