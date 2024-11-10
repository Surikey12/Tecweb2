<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Create/Create.php';

    $productos = new \Create\Create('Libreria');
    $productos -> addProduct(file_get_contents('php://input'));
    echo $productos->getData();

?>