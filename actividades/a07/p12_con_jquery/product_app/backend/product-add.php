<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Products.php';

    $productos = new \Products\Products('Libreria');
    $productos -> addProduct(file_get_contents('php://input'));
    echo $productos->getData();

?>