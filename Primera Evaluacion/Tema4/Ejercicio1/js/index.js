let divs = document.querySelectorAll("div");
divs.forEach(div => {
    console.log(`El id es: ${div.id}; y el texto es: ${div.textContent}`);
})

let as = document.querySelectorAll("a");
as.forEach(a => {
    console.log(`La url de ${a.id} es ${a.href}`);
})

verNodos(divs[0]);

function verNodos(nodo) {

    let subnodos = nodo.querySelectorAll("input");
    let flag = false;

    subnodos.forEach(subnodo => {
        if (subnodo.type === "text") {
            console.log("Text: " + subnodo.value);
            flag = true;
        }
    });

    if (!flag) {
        console.log("No hay subnodos de input type text");
    }
}