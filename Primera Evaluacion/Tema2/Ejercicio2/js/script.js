const ROW_COUNT = 4; //Se puede ampliar si se quieren guardar mas elementos
const COL_COUNT = 2;
const COL_NAMES = ["Nombre", "Primer apellido", "Segundo apellido", "Fecha"];
const DATE_REGEX = /^(0[1-9]|[1-2]\d|3[01])(\/)(0[1-9]|1[012])\2(\d{2})$/;
const NAME_REGEX = /^([A-Z][a-z]+\s?){0,2}/;

let dataString, dataSplitted;

do {
	dataString = prompt(
		"Introduce tu nombre, apellidos y fecha de nacimiento con el siguiente formato: \nnombre,apellido1,apellido2,fecha_nacimiento(dd/MM/yy)"
	);
	dataSplitted = dataString.split(",");
	// console.log(dataSplitted);
} while (dataSplitted.length != 4);

let tableHTML = "<table border='1'>";

for (let i = 0; i < ROW_COUNT; i++) {
	// console.log(dataSplitted[i]);
	if (i === ROW_COUNT - 1) {
		console.log("Check date");
		if (dataSplitted[i].match(DATE_REGEX) == null) {
			// console.log(dataSplitted[i].match(DATE_REGEX) == null);
			dataSplitted[i] = "Fecha no válida";
		} else {
			// console.log(new Date().getFullYear());
			let separatedDate = dataSplitted[i].split("/");
			let formattedDate = new Date(
				new Date().getFullYear() - separatedDate[2] < 2000
					? separatedDate[2]
					: parseInt(separatedDate[2]) + 2000,
				separatedDate[1] - 1,
				separatedDate[0]
			);

			dataSplitted[i] = formattedDate;

			// dataSplitted[i] = formattedDate.toLocaleDateString("es-es", {
			// 	weekday: "long",
			// 	year: "numeric",
			// 	month: "short",
			// 	day: "numeric",
			// 	hour: "2-digit",
			// 	second: "2-digit",
			// });
		}
	}
	tableHTML +=
		"<tr><td>" + COL_NAMES[i] + "</td><td>" + dataSplitted[i] + "</td></tr>";
}

tableHTML += "</table>";

document.getElementById("table").innerHTML = tableHTML;
