<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Products.php';

    $productos = new \Products\Products('Libreria');
    $productos ->singleId($_POST['id']);
    echo $productos->getData();
?>