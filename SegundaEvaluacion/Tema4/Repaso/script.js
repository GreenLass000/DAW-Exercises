/////////////////////////////////////LISTA DE USUARIOS////////////////////////////////////////////////
//Debe existir una respuesta a la petición de los usuarios existentes en el sistema. (GET asíncrono)
function pedirUsuarios() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = recibirUsuarios; // Función que recibirá la respuesta
    xhttp.open("GET", "pedirUsuarios.php", true); // Sin parámetros
    xhttp.send("");
}

//Recibe un array de nombres de usuario y muestra un listado
function recibirUsuarios() {
    if (this.readyState == 4 && this.status == 200) {
        let parrafoTitulo = document.createElement('h2');
        parrafoTitulo.textContent = "LISTA DE USUARIOS EXISTENTES:";
        let listado = JSON.parse(this.response);
        let ol = document.createElement("ol");
        listado.forEach(function (elemento) {
            //Por cada valor añadimos un elemento a la lista
            let li = document.createElement("li");
            let textoLi = document.createTextNode(elemento);
            li.appendChild(textoLi);
            ol.appendChild(li);
        });
        let divListado = document.querySelector('#listadoUsuarios');
        while (divListado.firstChild) { //Quitamos el contenido anterior
            divListado.removeChild(divListado.firstChild);
        }
        divListado.appendChild(parrafoTitulo); //Añadimos título
        divListado.appendChild(ol); //Añadimos la lista
    }
}

/////////////////////////////////////LOGIN////////////////////////////////////////////////
//Debe responder a la petición de Login con usuario y clave. (POST y crear Sesión) (Síncrono)
function login() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "login.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let usuario = document.getElementById("usuario").value;
    let clave = document.getElementById("clave").value;
    xhttp.send("usuario=" + usuario + "&clave=" + clave);
    if (xhttp.status === 200) {
    console.log(xhttp);
        //La respuesta será true o false para saber si el login tuvo éxito
        let respuesta = JSON.parse(xhttp.response);
        if (respuesta) {
            document.getElementById("tituloMenu").innerHTML = "MENÚ DE " + usuario;
        } else {
            alert("Error en el login.");
        }
    } else {
        alert("Error");
    }
}

/////////////////////////////////////COLOR////////////////////////////////////////////////
//Evento inicial de cambio de color
window.addEventListener('load', cargarColor);

//Debe leer el color elegido de un usuario (cookie) (get asíncrono)
function cargarColor() {
    var cookieValor = document.cookie.replace(/(?:(?:^|.*;\s*)color\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    document.getElementById("tituloMenu").style.backgroundColor = cookieValor;
}

//La petición sólo asigna el color
function colorUsuario(color) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = respuestaColorUsuario; // Sin paréntesis
    xhttp.open("GET", "colorUsuario.php?color=" + color, true);
    xhttp.send("");
}

//La respuesta sólo la utilizamos para actualizar el color
function respuestaColorUsuario() {
    if (this.readyState == 4 && this.status == 200) {
        //alert("No nos hace falta respuesta sólo cargar el color.");
        cargarColor();
    } else {
        //alert("Hubo otro cambio distinto.");
    }
}

/////////////////////////////////////USUARIO ACTUAL////////////////////////////////////////////////
//Debe responder el usuario que hay logueado en su sesión. (Sesión) (post síncrono)
function usuarioActual() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "usuarioActual.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    if (xhttp.status == 200) {
        alert(xhttp.response);
    } else {
        alert("Error");
    }
}

/////////////////////////////////////PRODUCTO MÁS RECIENTE////////////////////////////////////////////////
//Debe responder el producto añadido más recientemente. (get asíncrono)
function ultimoProducto() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = respuestaUltimoProducto;
    xhttp.open("GET", "ultimoProducto.php", true);
    xhttp.send("");
}

function respuestaUltimoProducto() {
    if (this.readyState == 4 && this.status == 200) {
        let array = JSON.parse(this.response);
        let id = array["id"];
        let nombre = array["nombre"];
        let precio = array["precio"];
        producto = "El último producto tiene el id " + id + ", se llama " + nombre + " y tiene un precio de " + precio + " euros.";
        document.getElementById("ultimoProducto").innerHTML = producto;

    } else {
        //alert("Hubo otro cambio distinto.");
    }
}

/////////////////////////////////////LISTA DE PRODUCTOS DEL USUARIO////////////////////////////////////////////////
//Debe responder a la petición de un listado de productos que el usuario actual puede ver (Sesión). (Get síncrono)
function pedirProductosUsuario() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "listaProductos.php", false);
    xhttp.send();
    if (xhttp.status == 200) {
        // Título y su texto
        let parrafoTitulo = document.createElement('h1');
        parrafoTitulo.textContent = "LISTA DE PRODUCTOS DE USUARIO:";
        // Lista desordenada y parseamos el resultado para recorrerlo
        let ul = document.createElement("ul");
        let listado = JSON.parse(xhttp.response);
        listado.forEach(function (elemento) {
            //Por cada valor añadimos un elemento a la lista
            let li = document.createElement("li");
            let a = document.createElement("a");
            //Creamos un enlace por cada elemento generado
            a.setAttribute("href", "javascript:infoProducto('" + elemento + "')");
            let liTexto = document.createTextNode(elemento);
            a.appendChild(liTexto);
            li.appendChild(a);
            ul.appendChild(li);
        });
        let divListado = document.querySelector('#listadoProductos');
        while (divListado.firstChild) { //Quitamos el contenido anterior
            divListado.removeChild(divListado.firstChild);
        }
        divListado.appendChild(parrafoTitulo); //Añadimos título
        divListado.appendChild(ul); //Añadimos la lista
    } else {
        alert("Error");
    }


}

/////////////////////////////////////INFORMACIÓN DE PRODUCTO////////////////////////////////////////////////
//Debe devolver la información referente a uno de los productos pedidos. (Post asíncrono)
function infoProducto(arg) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = respuestaInfoProducto;
    xhttp.open("POST", "infoProducto.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("producto=" + arg);
}

function respuestaInfoProducto() {
    if (this.readyState == 4 && this.status == 200) {
        let array = JSON.parse(this.response);
        //Recogemos los valores de la información
        let id = array["id"];
        let nombre = array["nombre"];
        let precio = array["precio"];
        let descripcion = array["descripcion"];
        // Título y su texto
        let parrafoTitulo = document.createElement('h1');
        parrafoTitulo.textContent = "INFORMACIÓN DEL " + nombre + ":";
        // Lista con la información
        let ul = document.createElement("ul");
        let li = document.createElement("li");
        let liTexto = document.createTextNode("Identificador: " + id);
        li.appendChild(liTexto);
        ul.appendChild(li);
        li = document.createElement("li");
        liTexto = document.createTextNode("Precio: " + precio + " euros.");
        li.appendChild(liTexto);
        ul.appendChild(li);
        li = document.createElement("li");
        liTexto = document.createTextNode("Descripción: " + descripcion);
        li.appendChild(liTexto);
        ul.appendChild(li);
        let divInfo = document.querySelector('#infoProducto');
        while (divInfo.firstChild) { //Quitamos el contenido anterior
            divInfo.removeChild(divInfo.firstChild);
        }
        divInfo.appendChild(parrafoTitulo); //Añadimos título
        divInfo.appendChild(ul); //Añadimos la lista
    }
}