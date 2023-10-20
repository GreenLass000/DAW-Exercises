let urls = ["https://www.amazon.com", "https://www.google.com", "https://www.nasa.gov"];

let ul = document.createElement("ul");
ul.id = "list";

document.body.appendChild(ul);

urls.forEach(url => {
    let li = document.createElement("li");
    let a = document.createElement("a");
    a.href = url;
    a.textContent = url;
    a.target = "_blank";

    li.appendChild(a);
    ul.appendChild(li);
});