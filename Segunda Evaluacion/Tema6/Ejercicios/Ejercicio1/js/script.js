const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        const flags = document.querySelector("#flags");
        const flag = document.createElement("div");

        xhr.response.forEach(d => {
            console.log(d.name["common"], d.flags["png"]);
        });

    } else {
        const error = document.querySelector("#error-message");
        error.innerHTML = "No se han podido cargar las banderas";
    }
});

xhr.open("GET", "https://restcountries.com/v3.1/all");
xhr.responseType = "json";
xhr.send();