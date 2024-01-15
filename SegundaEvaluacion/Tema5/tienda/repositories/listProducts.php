<?php

require_once "../bootstrap.php";

$productRepository = $entityManager->getRepository("Product");
$products = $productRepository->findAll();

foreach ($products as $product) {
    $department = $product->getDepartment();
    echo sprintf("\033[4mProducto %d\033[0m\n\t- Nombre: %s\n\t- Unidades: %d\n\t- Departamento: %s\n",
        $product->getId(),
        $product->getName(),
        $product->getUnits(),
        $department->getName());
}