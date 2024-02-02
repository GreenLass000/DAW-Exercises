const inputField = document.getElementById('inputField');
const hideButton = document.getElementById('hideButton');

function showInput(text) {
    inputField.style.width = '200px';
    inputField.style.opacity = '1';
    hideButton.classList.remove('hidden');
    inputField.value = text;
}

function hideInput() {
    inputField.style.width = '0';
    inputField.style.opacity = '0';
    hideButton.classList.add('hidden');
}

document.addEventListener('mousemove', function (event) {
    let card_x = getTransformValue(event.clientX, window.innerWidth, 56);
    let card_y = getTransformValue(event.clientY, window.innerHeight, 56);
    let shadow_x = getTransformValue(event.clientX, window.innerWidth, 20);
    let shadow_y = getTransformValue(event.clientY, window.innerHeight, 20);
    let text_shadow_x = getTransformValue(event.clientX, window.innerWidth, 28);
    let text_shadow_y = getTransformValue(event.clientY, window.innerHeight, 28);
    $(".floating").css("transform", "rotateX(" + card_y / 1 + "deg) rotateY(" + card_x + "deg)");
    $(".floating").css("box-shadow", -card_x + "px " + card_y / 1 + "px 55px rgba(0, 0, 0, .55)");
    $(".svg").css("filter", "drop-shadow(" + -shadow_x + "px " + shadow_y / 1 + "px 4px rgba(0, 0, 0, .6))");
    $(".text").css("text-shadow", -text_shadow_x + "px " + text_shadow_y / 1 + "px 6px rgba(0, 0, 0, .8)");
});

function getTransformValue(v1, v2, value) {
    return (v1 / v2 * value - value / 2).toFixed(1);
}

$(function () {
    setTimeout(function () {
        $("body").removeClass("active");
    }, 2200);
});