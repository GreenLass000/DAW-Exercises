function f1(arr) {
    return arr.map((item) => item * 3).filter((item2) => item2 % 4 !== 0);
}

function f2(arr) {
    return a.filter((item) => item % 2 !== 0);
}

function f3(arr) {
    return (a.filter((item, index) => index % 2 === 0)).reduce((a, b) => a + b, 0);
}

function f4(text) {
    return (text.split(" ").map((word, index) => (index === 0) ? word.toLowerCase() : (word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()))).join("")
}

function f5(str) {
    return str.split(" ").reduce((cont, word) => cont + word.length, 0) / str.split(" ").length;
}

function f6(str) {
    return str.split(" ").filter((item) => item.includes("a")).map((word) => word.length);
}