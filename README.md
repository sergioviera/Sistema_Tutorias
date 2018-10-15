# Sistema_Tutorias
Sistema de tutorias referente a la Practica 10 para cerrar la Unidad 01 de la materia de TAW.


Práctica no. 10
Entrega: 100% del proyecto.

Se requiere desarrollar un sistema en donde se controlen las tutorías llevadas a cabo entre un grupo de alumnos y un grupo de maestros, en donde considerando: 

1. Un alumno tiene asignado un tutor.
2. Un tutor tiene uno o más alumnos asignados.
3. Una sesión de tutoría puede ser grupal o individual.

Tomando como referencia las cuestiones anteriores, se desea llevar el control de las tutorías teniendo las siguientes vistas:

1. Login. - Acceso al sistema, solo el maestro puede hacerlo.
2. Una vez dentro mostrar un menú de opciones (NAV) en donde se muestren el mantenimiento (CRUD) de:
2.1. Alumnos.
2.2. Maestros.
2.3. Carreras.
2.4. Tutorías. Para este apartado se deben agregar los datos de la tutoría, es indispensable que un maestro solo puede dar tutoría a los alumnos asignados.
2.5. Reportes. - De alumnos, maestros y tutorías, se deberán mostrar en formato de tabla (dataTable).


Restricciones:


1. Un maestro solo puede ver los tutorados (alumnos) asignados.
2. El CRUD de Maestros solo lo puede hacer un "superadmin" el cual deberá existir ese rol en la base de datos.
3. El CRUD de Carreras solo lo puede hacer un "superadmin" el cual deberá existir ese rol en la base de datos.
4. El CRUD de Alumnos solo lo puede hacer un "superadmin" el cual deberá existir ese rol en la base de datos.
5. En las vistas utilizar componentes visuales de control, por ejemplo, "Select2" para buscar alumnos, maestros, carreras, etc.
6. Implementar ADMINLTE


Tablas posibles a utilizar:



Tabla: Alumnos.
Campos: 
Matrícula.
Nombre.
Carrera.
Tutor.

Tabla: Maestros.
Campos:
No. de empleado.
Carrera.
Nombre.
Email.
Password.

Tabla: Carreras.
Campos:
id
Nombre

Tabla: Sesión Tutoría.
Campos:
id
alumno
tutor (maestro)
fecha
hora
tipo de tutoria (grupal o individual[No es necesario hacer una tabla para este catalogo]).
Tutoría. (Campo de captura con la información de los temas tratados).

Se anexa ejemplo de CRUD y sesiones, se irá revisando avances (4) durante la próxima semana (Del 21 al 25 de mayo). Se deberá compartir:

- URL Repositorio.
- En esta ocasión el proyecto se desarrollar bajo el editor en linea Codeanywhere.com en donde deberán compartirme su proyecto, el cual deben ligarlo a su editor haciendo una conexión SSH a su servidor para trabajar 100% en línea, a mi cuenta de correo: systemas@gmail.com
- URL Server

Link de la activdad en el moodle: http://mariorc.com.mx/elearning/mod/assign/view.php?id=231 
