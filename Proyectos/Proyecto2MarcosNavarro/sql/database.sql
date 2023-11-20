-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS proyecto;

-- Usar la base de datos
USE proyecto;

-- Crear la tabla Directores
CREATE TABLE IF NOT EXISTS Directores
(
    id     INT AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

-- Crear la tabla Usuarios
CREATE TABLE IF NOT EXISTS Usuarios
(
    id                INT AUTO_INCREMENT,
    correoElectronico VARCHAR(255) NOT NULL,
    clave             VARCHAR(255) NOT NULL,
    nombre            VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

-- Crear la tabla Peliculas
CREATE TABLE IF NOT EXISTS Peliculas
(
    id         INT AUTO_INCREMENT,
    Titulo     VARCHAR(255) NOT NULL,
    Anio       INT,
    Duracion   INT,
    idDirector INT,
    PRIMARY KEY (id)
#     FOREIGN KEY (idDirector) REFERENCES Directores (id)
);

-- Crear la tabla Valoraciones
CREATE TABLE IF NOT EXISTS Valoraciones
(
    id            INT AUTO_INCREMENT,
    idUsuario     VARCHAR(255),
    idPelicula    INT,
    valorNumerico INT,
    comentario    TEXT,
    PRIMARY KEY (id)
#     FOREIGN KEY (idUsuario) REFERENCES Usuarios (correoElectronico),
#     FOREIGN KEY (idPelicula) REFERENCES Peliculas (Id)
);