<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";
$paths = [__DIR__ . "/src"];
$isDevMode = true;
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$dbParams = ['driver' => 'pdo_mysql', 'user' => 'root', 'password' => '', 'dbname' => 'doctrine', 'host' => 'localhost'];
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);