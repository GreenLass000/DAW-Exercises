USE proyecto;

# Directores
INSERT INTO directores(nombre)
VALUES ('Director1');
INSERT INTO proyecto.directores(nombre)
VALUES ('Director2');

# Usuarios
INSERT INTO usuarios(correoElectronico, clave, nombre)
VALUES ('usuario1@gmail.com', 'usr1', 'Dau');
INSERT INTO usuarios(correoElectronico, clave, nombre)
VALUES ('usuario2@gmail.com', 'usr2', 'Rosa');
INSERT INTO usuarios(correoElectronico, clave, nombre)
VALUES ('usuario3@gmail.com', 'usr3', 'Kvothe');

# Peliculas
INSERT INTO peliculas(Titulo, Anio, Duracion, idDirector)
VALUES ('El Nombre del Viento', 5230, 153, 1);
INSERT INTO peliculas(Titulo, Anio, Duracion, idDirector)
VALUES ('The Witcher: La pesadilla del lobo', 2021, 83, 2);
INSERT INTO peliculas(Titulo, Anio, Duracion, idDirector)
VALUES ('Alerta Roja', 2021, 118, 1);
INSERT INTO peliculas(Titulo, Anio, Duracion, idDirector)
VALUES ('Scooby-Doo: La maldicion del Monstruo del Lago', 2010, 85, 2);
INSERT INTO peliculas(Titulo, Anio, Duracion, idDirector)
VALUES ('El diario de Greg', 2021, 58, 2);

# Valoraciones
INSERT INTO valoraciones(idUsuario, idPelicula, valorNumerico, comentario)
VALUES (1, 1, ROUND(RAND() * (5 - 1) + 1), 'Comentario Generico');
INSERT INTO valoraciones(idUsuario, idPelicula, valorNumerico, comentario)
VALUES (2, 2, ROUND(RAND() * (5 - 1) + 1), 'Comentario Generico');
INSERT INTO valoraciones(idUsuario, idPelicula, valorNumerico, comentario)
VALUES (3, 3, ROUND(RAND() * (5 - 1) + 1), 'Comentario Generico');
INSERT INTO valoraciones(idUsuario, idPelicula, valorNumerico, comentario)
VALUES (3, 4, ROUND(RAND() * (5 - 1) + 1), 'Comentario Generico');
INSERT INTO valoraciones(idUsuario, idPelicula, valorNumerico, comentario)
VALUES (2, 5, ROUND(RAND() * (5 - 1) + 1), 'Comentario Generico');
INSERT INTO valoraciones(idUsuario, idPelicula, valorNumerico, comentario)
VALUES (1, 6, ROUND(RAND() * (5 - 1) + 1), 'Comentario Generico');