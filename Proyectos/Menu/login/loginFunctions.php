<?php
function login()
{
    echo "
        <form action='login.php' method='post'>
            Username: <input type='text' name='user' id='user'><br>
            Password: <input type='password' name='pass' id='pass'><br>
            <input type='submit' value='Enviar'>
        </form>
        <a href='../index.php'>Menu</a>
    ";
}

function loginCheck()
{
    $validations = ["Marcos", "1234"];

    if ($_POST["user"] === $validations[0] && $_POST["pass"] === $validations[1]) {
        echo "Hola Mundo, $validations[0]";
        $_POST = [];
        echo "<a href='login.php'>Re-Login</a><br>";
        echo "<a href='../index.php'>Menu</a>";
    } else {
        echo "Error de login<br>";
        $_POST = [];
        echo "<a href='login.php'>Re-Login</a><br>";
        echo "<a href='../index.php'>Menu</a>";
    }
}