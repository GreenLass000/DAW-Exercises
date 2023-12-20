<?php
/**
 * Crea un formulario de login
 * @return void
 */
function login()
{
    echo "
        <form action='login.controller' method='post'>
            Username: <input type='text' name='user' id='user'><br>
            Password: <input type='password' name='pass' id='pass'><br>
            <input type='submit' value='Enviar'>
        </form>
    ";
}

/**
 * Comprueba que el usuario y la contraseña sean correctos, Muestra mensaje de bienvenida o error dependiendo del caso
 * @return void
 */
function loginCheck()
{
    $validations = ["Marcos", "1234"];

    if ($_POST["user"] === $validations[0] && $_POST["pass"] === $validations[1]) {
        echo "Hola Mundo, $validations[0]";
        $_POST = [];
        echo "<a href='login.controller'>Re-Login</a><br>";
//        echo "<a href='../index.controller'>Menu</a>";
    } else {
        echo "Error de login<br>";
        $_POST = [];
        echo "<a href='login.controller'>Re-Login</a><br>";
//        echo "<a href='../index.controller'>Menu</a>";
    }
}