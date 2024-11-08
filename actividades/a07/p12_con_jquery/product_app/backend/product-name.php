<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Products.php';

    $productos = new \Products\Products('Libreria');
    $productos ->singleByName($_POST['name']);
    echo $productos->getData();
?>