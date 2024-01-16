<?php

require_once "../bootstrap.php";

$departments = $entityManager->getRepository("Department")->findBy(array("name" => "Ropa"));

foreach ($departments as $department) {
    echo sprintf("%s\n", $department->getName());
    foreach ($department->getProducts() as $product) {
        echo sprintf("\t- %s\n", $product->getName());
    }
}