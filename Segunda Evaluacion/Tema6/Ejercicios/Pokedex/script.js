let numeroDePokemons;

function getNumberOfPokemons() {
    const url_number = "https://pokeapi.co/api/v2/pokemon-species";

    return new Promise(async (resolve, reject) => {
        try {
            const response = await fetch(url_number);
            const data = await response.json();
            numeroDePokemons = data.count;
            resolve(numeroDePokemons);
        } catch (error) {
            console.error(error);
            reject(error);
        }
    });
}

async function fetchDataAndExecute() {
    try {
        await getNumberOfPokemons();

        //
        for (let i = 1; i <= numeroDePokemons; i++) {
            const url = `https://pokeapi.co/api/v2/pokemon/${i}/`;
            const request = new Request(url, {});
            fetch(request)
                .then(response => response.json())
                .then(data => console.log(data["id"], data["name"]));
        }
        //

    } catch (error) {
        console.error(error);
    }
}

fetchDataAndExecute();
