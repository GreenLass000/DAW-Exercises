<?php

require_once "../bootstrap.php";

$departmentRepository = $entityManager->getRepository("Department");
$departments = $departmentRepository->findAll();

foreach ($departments as $department) {
    echo sprintf("%s\n", $department->getName());
}