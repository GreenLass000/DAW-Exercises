const size = 5;
const random = ~~(Math.random() * 5);

for (let i = 0; i < size; i++) {
    const div = document.createElement("div");
    div.classList.add("empty");

    if (i === random) {
        const start = document.createElement("div");
        start.classList.add("fill");
        start.draggable = true;

        div.appendChild(start);
    }

    document.body.appendChild(div);
}

const fill = document.querySelector(".fill");
const empties = document.querySelectorAll(".empty");

fill.addEventListener("dragstart", dragStart);
fill.addEventListener("dragend", dragEnd);

for (const empty of empties) {
    empty.addEventListener('dragover', dragOver);
    empty.addEventListener('dragenter', dragEnter);
    empty.addEventListener('dragleave', dragLeave);
    empty.addEventListener('drop', dragDrop);
}

/**
 * Se llama cuando agarras un elemento draggable
 */
function dragStart() {
    this.classList.add("hold");
    setTimeout(() => (this.className = ""), 0);
}

/**
 * Se llama cuando termina al final del t-odo cuando acaba el evento de drag&drop
 */
function dragEnd() {
    this.className = "fill";
}

/**
 * Se llama cuando arrastras el elemento sobre otro
 * @param e
 */
function dragOver(e) {
    e.preventDefault();
}

/**
 * Se llama cuando entras con un elemento en otro
 * @param e
 */
function dragEnter(e) {
    e.preventDefault();
    this.classList.add("hovered");
}

/**
 * Se llama cuando sales de un elemento
 */
function dragLeave() {
    this.className = "empty";
}

/**
 * Se llama cuando sueltas el elemento
 */
function dragDrop() {
    this.className = "empty";
    this.append(fill);
}