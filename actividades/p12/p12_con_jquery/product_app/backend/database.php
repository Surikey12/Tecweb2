<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '123_abc',
        'Libreria'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>