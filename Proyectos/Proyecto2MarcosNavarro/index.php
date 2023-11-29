<?php
echo "
<html lang='es'>
<head>
<link rel='stylesheet' href='style/style.css'>
<title>PHPAvanazdo</title>
</head>
<body>";
// ----------------------------------------------------------------

include_once "templates/header.php";
printHeader(true);

if (isset($_SESSION["user"])) {
    if (empty($_SESSION["user"])) {
        echo "Bienvenida sin login";
    } else {
        echo "Bienvenida con login";
    }
} else {
    $_SESSION["user"] = "";
    header("Location: index.php");
}
// ----------------------------------------------------------------
echo "
</body>
</html>
";