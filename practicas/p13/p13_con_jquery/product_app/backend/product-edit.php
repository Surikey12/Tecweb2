<?php

    namespace backend;
    require_once __DIR__ . '/vendor/autoload.php';
    use MyApi\Update\Update;

    $productos = new Update('Libreria');
    $productos -> editProduct(file_get_contents('php://input'));
    echo $productos->getData();
?>