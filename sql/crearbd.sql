DROP DATABASE Juegos;
CREATE DATABASE Juegos;
USE Juegos;

CREATE TABLE Usuarios(
    idUsuario smallint NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    apellido varchar(50) NOT NULL,
    correo varchar(50) NOT NULL UNIQUE,
    passw varchar(50) NOT NULL,

    CONSTRAINT PK_idUsuario PRIMARY KEY(idUsuario)
);

CREATE TABLE Minijuegos(
    idMinijuego smallint NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    url VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL,
    CONSTRAINT PK_idMinijuego PRIMARY KEY(idMinijuego)
);

CREATE TABLE Preferencias(
    idUsuario smallint NOT NULL,
    idMinijuego smallint NOT NULL,

    CONSTRAINT FK_idUsuario FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario),
    CONSTRAINT FK_idMinijuego FOREIGN KEY (idMinijuego) REFERENCES Minijuegos(idMinijuego),
    CONSTRAINT PK_idUsuarioJuegos PRIMARY KEY(idUsuario, idMinijuego)
);