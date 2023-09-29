const MONTH_NAMES = [
	"Enero",
	"Febrero",
	"Marzo",
	"Abril",
	"Mayo",
	"Junio",
	"Junio",
	"Agosto",
	"Septiembre",
	"Octubre",
	"Noviembre",
	"Diciembre",
];

for (let i = 0; i < MONTH_NAMES.length; i++) {
	let newDiv = document.createElement("div");
	newDiv.textContent = MONTH_NAMES[i];
	newDiv.style.width = "200px";
	newDiv.style.height = "50px";
	newDiv.style.fontSize = "20px";
	newDiv.className = "month";

	newDiv.style.backgroundColor =
		"rgb(" + random(255) + ", " + random(255) + "," + random(255) + ")";
	document.body.appendChild(newDiv);

	newDiv.style.position = "absolute";
	newDiv.style.marginTop = random(200) + "px";
	newDiv.style.marginLeft = random(800) + "px";
}

function random(max) {
	// ~~ es lo mismo que Math.floor()
	return ~~(Math.random() * max + 1);
}
