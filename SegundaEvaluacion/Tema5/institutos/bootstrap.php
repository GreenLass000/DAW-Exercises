<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$paths = [__DIR__ . "/src"];

$isDevMode = true;
$entityManager = null;

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'institutos',
    'host' => 'localhost'
];

try {
    $connection = DriverManager::getConnection($dbParams, $config);
    $entityManager = new EntityManager($connection, $config);
} catch (\Doctrine\DBAL\Exception|MissingMappingDriverImplementation $e) {
    echo $e->getMessage();
}