document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    let image = "";

    if (params.has("img")) {
        image = params.get("img");
        // console.log("hasIMG")
        if (parseInt(image) <= 0 && parseInt(image) > 3) {
            console.log("Error range")
            window.location = "index.html";
        }
    } else {
        console.log("noimg")
        window.location = "index.html";
    }

    const piecesContainer = document.querySelector("#pieces");
    const imgUrl = `./images/img${image}.jpg`;

    for (let i = 0; i < 9; i++) {
        const div = document.createElement("div");
        div.classList.add("image");
        div.style.backgroundImage = `url(${imgUrl})`;
        div.style.backgroundPosition = `-${i % 3 * 233}px -${Math.floor(i / 3) * 233}px`;
        piecesContainer.appendChild(div);
    }

    document.body.appendChild(piecesContainer);
});