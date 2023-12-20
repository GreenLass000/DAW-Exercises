DROP  DATABASE IF EXISTS productosJson;
CREATE DATABASE productosJson;
USE productosJson;
CREATE TABLE usuarios(nombre varchar(50) PRIMARY KEY, clave varchar(8));
CREATE TABLE productos(id int AUTO_INCREMENT PRIMARY KEY, nombre varchar(50) unique, precio int, descripcion varchar(100));
CREATE TABLE usuariosProductos(
	idUsuario varchar(50),
    idProducto int,
    primary key (idUsuario, idProducto),
    foreign key (idUsuario) references usuarios (nombre),
    foreign key (idProducto) references productos (id));

INSERT INTO usuarios(nombre, clave) VALUES
	("Amparo", "c1"), ("Bart", "c2"), ("Carlos", "c3"), ("Daniel", "c4"), ("Elena", "c5");
INSERT INTO productos (nombre, precio, descripcion) VALUES
	("Bolígrafo", 1, "Sirve para escribir"),
    ("Agenda", 3, "En ella apuntamos las tareas"),
    ("Estuche", 5, "Sirve para guardar pinturas y bolis"),
    ("Rotuladores", 7, "Sirve para escribir"),
    ("Cuaderno", 9, "En él podemos escribir");
INSERT INTO usuariosProductos(idUsuario, idProducto) VALUES
	("Amparo", "1"),
    ("Amparo", "2"),
    ("Amparo", "3"),
    ("Bart", "2"),
    ("Bart", "5"),
    ("Carlos", "1"),
    ("Carlos", "3"),
    ("Carlos", "4"),
    ("Daniel", "1"),
    ("Daniel", "5"),
    ("Elena", "2"),
    ("Elena", "3"),
    ("Elena", "4");