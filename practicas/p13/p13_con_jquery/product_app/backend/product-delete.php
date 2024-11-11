<?php

    namespace backend;
    require_once __DIR__ . '/vendor/autoload.php';
    use MyApi\Delete\Delete;

    $productos = new Delete('Libreria');
    $productos -> deleteProduct($_POST['id']);
    echo $productos->getData();
?>