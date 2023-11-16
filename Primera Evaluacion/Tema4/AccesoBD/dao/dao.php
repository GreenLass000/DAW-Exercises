<?php

include_once "connectionDB.php";

$credentials = ["root", "", "usuarios"];

function selectAll()
{
    global $credentials;
    $db = connectBD(...$credentials);
    $db = null;
}

function insert()
{
    global $credentials;
    $db = connectBD(...$credentials);
    $db = null;
}

function saveData()
{
    global $credentials;
    $db = connectBD(...$credentials);
    $db = null;
}