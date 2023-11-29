<?php
echo "
<html lang='es'>
<head>
<link rel='stylesheet' href='../style/style.css'>
<title>PHPAvanazdo</title>
</head>
<body>";
// ----------------------------------------------------------------

if (empty($_SESSION["user"])) {
    header("Location: login.php");
} else {
    echo "Cuenta";
}

// ----------------------------------------------------------------
echo "
</body>
</html>
";