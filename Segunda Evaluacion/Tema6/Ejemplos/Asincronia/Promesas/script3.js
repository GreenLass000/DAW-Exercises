async function contarAlbumsUsuarios(...idUsuarios) {
    const promesas = idUsuarios.map(id => fetch(`https://jsonplaceholder.typicode.com/albums/${id}`));

    const responses = await Promise.all(promesas);

    let albums = responses.map(response => response.json());
    albums = await Promise.all(albums);

    return albums;
}

(async () => {
    try {
        const albums = await contarAlbumsUsuarios(1, 2);
        console.log(albums);
    } catch (error) {
        console.log(error);
    }
})()