<?php

require_once "../bootstrap.php";

$products = $entityManager->getRepository("Product")->findBy(array("units" => 0));

foreach ($products as $product) {
    echo sprintf("- %s", $product->getName());
}