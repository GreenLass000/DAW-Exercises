<?php
require_once "connectionBD.php";
$bd = connection();
$query='SELECT * FROM valores';
$total=0;
$suma=$bd->query($query);
foreach ($suma as $value){
    $total+=$value["valor"];
}
$json=json_encode($total);
echo $json;