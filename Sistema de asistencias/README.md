# SOFTWARE NECESARIO Y VERSIONES

  El siguiente listado detalla el software necesario para el funcionamiento de la aplicación:

  PHP 8.1.10 o superior.
  Laragon.
  MySQL 8.0.30.

# VISTAS Y FUNCIONES PRINCIPALES

**Ventana Principal**

  Se mostrará una pantalla de inicio de sesión (LogIn) donde el profesor podrá iniciar sesión o registrarse.

**Registro**

  Al hacer clic en **"Regístrate Aquí"**, el sistema permitirá al profesor ingresar sus datos y registrarse en la plataforma.

  Datos requeridos:
  - Nombre del profesor.
  - Apellido del profesor.
  - Correo electrónico.
  - Contraseña.
  - DNI.
  - Selección del instituto en el que trabaja.
  - Legajo.
  Después de completar el registro, el sistema redirigirá al profesor a la pantalla de inicio de sesión (LogIn) para que pueda acceder con sus credenciales.

 **Inicio de Sesión (Log In)**

  Al hacer clic en **"Ingresar"**, el sistema solicitará al usuario que ingrese su correo electrónico y contraseña.
  Si alguno de los datos ingresados es incorrecto, el sistema mostrará un mensaje de error.

**Panel de Control (Dashboard)**

  El panel de control mostrará el nombre del profesor, su instituto y un listado de los alumnos, con la posibilidad de buscar por las materias que cursan.
  Al hacer clic en el botón **"Nueva Materia"**, el profesor podrá crear nuevas materias.
  Una vez creada la materia, el sistema redirigirá al listado donde aparecerá un nuevo botón "Nuevo Alumno", que permitirá dar de alta a los alumnos.

**Nueva Materia**

  Al hacer clic en el botón "Nueva Materia", se mostrará una pantalla donde el profesor podrá crear una materia.

**Nuevo Alumno**

  Al hacer clic en "Nuevo Alumno", el sistema permitirá al profesor ingresar los datos del alumno y agregarlo al listado.

  Datos requeridos:
  - Nombre del alumno.
  - Apellido del alumno.
  - DNI.
  - Correo electrónico.
  - Fecha de nacimiento.
  - Materia.
  Después de registrar al alumno, el sistema redirigirá al listado, donde el alumno aparecerá registrado.

**Listado de Alumnos**

  Se mostrará un listado de todos los alumnos registrados por el profesor.

  El profesor podrá agregar asistencia a cada alumno haciendo clic en el botón "Agregar Asistencia".
  En la parte derecha de la lista, habrá opciones para cada alumno, como modificar sus datos, eliminar al alumno, ver sus asistencias y registrar sus notas.
  Cada alumno tendrá un promedio de sus notas y un estado (libre, regular o promoción), determinado por la cantidad de asistencias registradas.
