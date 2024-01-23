# Explicación proyecto primera evaluación <u>DIW</u>

- [Enunciado.pdf](resources/pdf/Enunciado.pdf)

## Separacion CSS

He querido separar los archivos css en varios bloques

### `colors.css`

En este archivo estan todos los colores que se utilizan en el proyecto, al estar en `:root` son accesibles
desde cualquier parte del codigo, y con modificarlos desde ese archivo se cambia en toda la pagina.

### `style.css`

En este archivo estan todos los estilos genericos de la aplicacion, como la estructura, los colores del `body`
aplicados, etc...

### `header.css` y `footer.css`

Son los estilos correspondientes al `header` y al `footer`, no estan en `style.css` porque me parecía mas comprensible a
la hora de corregir el codigo tenerlo todo separado.

### `carrito.css`, `catalogo.css`, `contact.css` y `register.css`

Son los archivos correspondientes a las paginas con su nombre, igual que header y footer, no están incluidos en style
porque es mas legible tenerlo separado, tambien porque me parece que tener referenciado código css en varias paginas
donde no se usa es ineficiente.

## Estructuración

El proyecto esta estructurado de forma que sea entendible y facil de mantener para cualquier persona.

- `index.html`, es la pagina principal, el inicio de la aplicacion web y la primera ventana que ve el usuario.
- `style` es un directorio donde se encuentran todos los archivos `css` del proyecto.
- `resources` contiene todos los archivos multimedia
    - `icons` contiene el logo de la pagina
    - `images` contiene las imagenes usadas en el proyecto
    - `pdf` contiene el enunciado de la practica, no se usa en el proyecto, solo es un acceso rapido para mi
    - `videos` contiene los videos usados en el proyecto
- `pages` es un directorio donde se encuentran los archivos `html` diferentes al `index.html`, dentro se encuentran los
  archivos del `navbar` y un directorio llamado `games` donde se encuentran las paginas de todos los juegos de la
  aplicacion web.