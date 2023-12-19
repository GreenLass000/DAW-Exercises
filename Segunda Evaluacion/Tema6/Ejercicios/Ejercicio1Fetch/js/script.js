const url = "https://restcountries.com/v3.1/all";
fetch(url)
    .then(response => {
        if (!response.ok) {
            throw new Error("No se han podido cargar las banderas");
        }
        return response.json();
    })
    .then(data => {
        const flags = document.querySelector("#flags");
        const flag = document.createElement("div");
        flag.classList.add("flag");
        const name = document.createElement("div");
        name.classList.add("name");
        const img = document.createElement("img");
        img.classList.add("img");

        data.forEach(d => {

            const cloneName = name.cloneNode();
            const cloneImg = img.cloneNode();
            const cloneFlag = flag.cloneNode();

            cloneName.textContent = d.name["common"];
            cloneImg.src = d.flags["svg"];

            cloneFlag.appendChild(cloneName);
            cloneFlag.appendChild(cloneImg);

            flags.appendChild(cloneFlag);
        });
    })
    .catch(error => {
        const err = document.querySelector("#error-message");
        err.innerHTML = error;
    });