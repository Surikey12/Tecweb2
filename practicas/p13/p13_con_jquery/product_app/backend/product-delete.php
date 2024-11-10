<?php

    namespace backend;
    require_once __DIR__ . '/myapi/Delete/Delete.php';

    $productos = new \Delete\Delete('Libreria');
    $productos -> deleteProduct($_POST['id']);
    echo $productos->getData();
?>