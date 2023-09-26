const ROW_COUNT = 4; //Se puede ampliar si se quieren guardar mas elementos
const COL_COUNT = 2;
const COL_NAMES = ["Nombre", "Primer apellido", "Segundo apellido", "Fecha"];
const DATE_REGEX = /^(0[1-9]|[1-2]\d|3[01])(\/)(0[1-9]|1[012])\2(\d{4})$/;

let dataString = prompt(
	"Introduce tu nombre, apellidos y fecha de nacimiento con el siguiente formato: \nnombre,apellido1,apellido2,fecha_nacimiento(dd/MM/yyyy)"
);

let dataSplitted = dataString.split(",");
let tableHTML = "<table border='1'>";

for (let i = 0; i < ROW_COUNT; i++) {
	console.log(dataSplitted[i]);
	if (i === ROW_COUNT - 1) {
		console.log("Check date");
		if (dataSplitted[i].match(DATE_REGEX) == null) {
			console.log(dataSplitted[i].match(DATE_REGEX) == null);
			dataSplitted[i] = "Fecha no válida";
		} else {
			let formattedDate = new Date(dataSplitted[i]);
			dataSplitted[i] = formattedDate.toLocaleDateString("es-es", {
				weekday: "long",
				year: "numeric",
				month: "short",
				day: "numeric",
				hour: "2-digit",
				second: "2-digit",
			});
		}
	}
	tableHTML +=
		"<tr><td>" + COL_NAMES[i] + "</td><td>" + dataSplitted[i] + "</td></tr>";
}

tableHTML += "</table>";

document.getElementById("table").innerHTML = tableHTML;
