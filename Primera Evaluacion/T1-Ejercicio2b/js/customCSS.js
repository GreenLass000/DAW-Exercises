function changeButtonBackgroundImage(event, button) {
    // if (event.type === "mouseover") {
    //     let image;
    //     switch (button.id) {
    //         case "esp":
    //             image = "esp.png";
    //             break;
    //         case "eng":
    //             image = "eng.jpg";
    //             break;
    //         case "it":
    //             image = "it.png";
    //             break;
    //     }
    //     button.style.backgroundImage = "url(resources/" + image + ")";
    //     button.style.color = "transparent";
    // } else if (event.type === "mouseout") {
    //     button.style.backgroundImage = "";
    //     button.style.color = "black";
    // }

    button.style.backgroundImage = event.type === "mouseover" ?
        "url(resources/" + button.id + ".png)" :
        "";

    button.style.color = event.type === "mouseover" ?
        "transparent" :
        "black";
}