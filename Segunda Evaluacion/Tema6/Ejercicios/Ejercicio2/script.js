const table = document.querySelector("#table-body");
const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        const data = getData(xhr);

        data.forEach(row => {
            const newRow = document.createElement("tr");
            newRow.addEventListener("click", rowClick);
            Array.from(row).forEach(rowItem => {
                const cell = document.createElement("td");
                cell.textContent = rowItem;
                newRow.appendChild(cell);
            });
            table.appendChild(newRow);
        });
    } else {
        const error = document.querySelector("#error-message");
        error.innerHTML = "No se han podido cargar los datos";
    }
});

xhr.open("GET", "https://jsonplaceholder.typicode.com/users");
xhr.responseType = "json";
xhr.send();

function rowClick(e) {
    console.log(e.target.parentNode.children[0].textContent);
}

function getData(xhr) {
    let response = [];
    xhr.response.forEach(data => {
        response.push([data.id, data.name, data.username, data.email]);
    });
    return response;
}