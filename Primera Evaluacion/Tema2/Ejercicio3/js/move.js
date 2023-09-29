const WINDOW_WIDTH = window.innerWidth;
const WINDOW_HEIGHT = window.innerHeight;

setInterval(function (e) {
	let months = document.getElementsByClassName("month");
	console.log(months);
	for (let i = 0; i < months.length; i++) {
		months[i].style.marginTop = random(WINDOW_HEIGHT - 100) + "px";
		months[i].style.marginLeft = random(WINDOW_WIDTH - 250) + "px";
	}
}, 500);
