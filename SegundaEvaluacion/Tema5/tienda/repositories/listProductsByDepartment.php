<?php

require_once "../bootstrap.php";

$departmentRepository = $entityManager->getRepository("Department");
$departments = $departmentRepository->findAll();

foreach ($departments as $department) {
    echo sprintf("%s\n", $department->getName());
    foreach ($department->getProducts() as $product) {
        echo sprintf("\t- %s\n", $product->getName());
    }
}