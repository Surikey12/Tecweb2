<?php

    namespace backend;
    require_once __DIR__ . '/vendor/autoload.php';
    use MyApi\Create\Create;

    $productos = new Create('Libreria');
    $productos -> addProduct(file_get_contents('php://input'));
    echo $productos->getData();

?>