# Pasos para el correcto funcionamiento de la aplicacion.

- Ejecutar `scripts/reset_database.php`
- Seguir los pasos de la pagina web
- Cerrar la pestaña del navegador
- Ejecutar `index.php`

## Flujo del programa

- Inicio
  - Sin login: Muestra bienvenida sin login
  - Con login: Muestra bienvenida con login
- Peliculas
  - Muestra una lista de las peliculas
  - Info de peliculas
  - - Sin login: Muestra la info de la pelicula seleccionada y sus valoraciones
    - Con login: Muestra la info de la pelicula seleccionada y sus valoraciones. Puedes añadir una nueva valoracion
- Directores
  - Muestra una lista de los directores
  - Info de directores
    - Muestra la info del director seleccionado
- Nueva Pelicula
  - Sin login: Aviso de que no puedes añadir una pelicula sin estar logueado
  - Con login: Permite añadir una nueva pelicula
- Login
  - Si no se esta logueado aparece la pagina login que te permite loguearte
- Cuenta
  - Si ya estas logueado aparece la pagina cuenta que te muestra tus datos, tu ultimo comentario y te permite cerrar sesion

