<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Update/Update.php';

    $productos = new \Update\Update('Libreria');
    $productos -> editProduct(file_get_contents('php://input'));
    echo $productos->getData();
?>