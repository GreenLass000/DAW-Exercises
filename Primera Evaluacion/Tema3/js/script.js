function f1(arr) {
    let newArr = [];
    for (let item of arr) {
        if (item % 4 !== 0)
            newArr.push(item * 3);
    }
    return newArr;
}

function f2(arr) {
    for (let item of arr) {
        if (item % 2 !== 0) {
            console.log(item);
        }
    }
}

function f3(arr) {
    let result = 0;
    for (let item of arr) {
        if (item % 2 === 0) {
            result += item;
        }
    }
    return result;
}

function f4(text) {
    let strSplitted = text.split(" ");
    let camelCase = "";
    for (let word of strSplitted) {
        if (word === strSplitted[0]) {
            camelCase += strSplitted[0];
        } else {
            camelCase += word.charAt(0).toUpperCase() + word.slice(1);
        }
    }
    return camelCase;
}

function f5(str) {
    let strSplitted = str.split(" ");
    let size = 0;
    for (let word of strSplitted) {
        size += word.length;
    }
    return size / strSplitted.length;
}

function f6(str) {
    let strSplitted = str.split(" ");
    let lng = [];
    for (let word of strSplitted) {
        if (word.includes("a")) {
            lng.push(word.length);
        }
    }
    return lng;
}