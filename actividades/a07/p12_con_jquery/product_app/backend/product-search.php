<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Products.php';

    $productos = new \Products\Products('Libreria');
    $productos ->searchProducts($_POST['search']);
    echo $productos->getData();
?>