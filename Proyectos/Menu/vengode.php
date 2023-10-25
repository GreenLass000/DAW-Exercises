<?php
//Muestra el parametro page desde el get
$page = $_GET["page"] ?? "";
echo "<h1>Vengo de $page</h1>";