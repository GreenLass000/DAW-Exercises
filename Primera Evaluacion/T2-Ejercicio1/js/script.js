let rows = parseInt(prompt("Introduce el numero de filas: "));
let cols = parseInt(prompt("Introduce el numero de columnas: "));

let tableHTML = "<table border='1'>";

for (let i = 0; i < rows; i++) {
	tableHTML += "<tr>";
	for (let j = 0; j < cols; j++) {
		tableHTML += "<td>" + i + "," + j + "</td>";
	}
	tableHTML += "</tr>";
}
tableHTML += "</table>";

document.getElementById("table").innerHTML = tableHTML;
