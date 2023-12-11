setTimeout(() => {
    console.log("He ejecutado la funcion");
}, 2000);

document.addEventListener("click", () => {
    console.log("Se ha pulsado click");
});

const xhr = new XMLHttpRequest();
xhr.addEventListener("load", e => {
    if (xhr.status >= 200 && xhr.status < 300) {
        console.log(JSON.parse(xhr.response));
    }
});
