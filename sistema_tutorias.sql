DROP DATABASE IF EXISTS sistema_tutorias;

CREATE DATABASE IF NOT EXISTS sistema_tutorias;

USE sistema_tutorias;

CREATE TABLE usuarios(
	usuario_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(100) NOT NULL,
	rol varchar(50) NOT NULL,
	correo varchar(50) NOT NULL,
	password char(32) NOT NULL

);

CREATE TABLE carreras(
	carrera_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(50) NOT NULL

);

CREATE TABLE tutores(
	numero_empleado INT(11) NOT NULL PRIMARY KEY,
	nombre varchar(100) NOT NULL,
	carrera INT(11) NOT NULL,
	email varchar(50) NOT NULL,
	password char(32) NOT NULL,

	FOREIGN KEY(carrera) REFERENCES carreras(carrera_id)

);

CREATE TABLE alumnos(
	matricula varchar(10) PRIMARY KEY,
	nombre varchar(100) NOT NULL,
	carrera INT(11) NOT NULL,
	situacion varchar(20) NOT NULL,
	correo varchar(50) NOT NULL,
	tutor_id INT(11),
	foto varchar(100) NOT NULL,

	FOREIGN KEY(carrera) REFERENCES carreras(carrera_id),
	FOREIGN KEY (tutor_id) REFERENCES tutores(numero_empleado)
);

CREATE TABLE sesion_tutoria(
	sesion_id INT(10) NOT NULL,
	tutor INT(11) NOT NULL,
	fecha DATE,
	hora varchar(10) NOT NULL,
	tipo varchar(15) NOT NULL,
	descripcion TEXT,

	FOREIGN KEY(tutor) REFERENCES tutores(numero_empleado)
);

CREATE TABLE alumnos_tutoria(
	sesion_id INT(10),
	alumno varchar(10),

	FOREIGN KEY(alumno) REFERENCES alumnos(matricula)
);