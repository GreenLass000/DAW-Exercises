const xhr = new XMLHttpRequest();
xhr.addEventListener("load", () => {
    if (xhr.status === 200) {
        const flags = document.querySelector("#flags");
        const flag = document.createElement("div");
        flag.classList.add("flag");
        const name = document.createElement("div");
        name.classList.add("name");
        const img = document.createElement("img");
        img.classList.add("img");

        xhr.response.forEach(d => {

            const cloneName = name.cloneNode();
            const cloneImg = img.cloneNode();
            const cloneFlag = flag.cloneNode();

            cloneName.textContent = d.name["common"];
            cloneImg.src = d.flags["svg"];

            cloneFlag.appendChild(cloneName);
            cloneFlag.appendChild(cloneImg);

            flags.appendChild(cloneFlag);
        });

    } else {
        const error = document.querySelector("#error-message");
        error.innerHTML = "No se han podido cargar las banderas";
    }
});

xhr.open("GET", "https://restcountries.com/v3.1/all");
xhr.responseType = "json";
xhr.send();