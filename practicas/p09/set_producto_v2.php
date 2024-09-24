<?php

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '123_abc', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['desc'];
    $unidades = $_POST['unidad'];
    $imagen = $_POST['img'];

    // Validar si nombre, marca y modelo ya existen en la base de datos
    $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // El producto ya existe
        echo "<p style='color:red;'>Advertencia: El producto ya existe en la base de datos.</p>";
    } else {
        // Insertar el nuevo producto
        $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$descripcion}', {$unidades}, '{$imagen}', 0)";
        if($link->query($sql)){
            // Mostrar un resumen de los datos insertados
            echo "<h2>Producto agregado con éxito</h2>";
            echo "<ul>";
            echo "<li>Nombre: $nombre</li>";
            echo "<li>Marca: $marca</li>";
            echo "<li>Modelo: $modelo</li>";
            echo "<li>Precio: $precio</li>";
            echo "<li>Unidades: $unidades</li>";
            echo "<li>Descripción: $descripcion</li>";
            echo "<li>Imagen: $imagen</li>";
            echo "</ul>";
        }
        else{
            echo 'El Producto no pudo ser insertado =(';
        }
    }
    $link->close();
}
?>
