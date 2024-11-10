<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Read/Read.php';

    $productos = new \Read\Read('Libreria');
    $productos ->listProducts();
    echo $productos->getData();
?>