<?php

    namespace backend;
    require_once __DIR__ . '/vendor/autoload.php';
    use MyApi\Read\Read;

    $productos = new Read('Libreria');
    $productos ->singleId($_POST['id']);
    echo $productos->getData();
?>