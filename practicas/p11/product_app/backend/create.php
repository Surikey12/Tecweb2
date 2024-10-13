<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);

        // Extraer datos del objeto JSON
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        // Validar si nombre, marca y modelo ya existen en la base de datos
        $sql = "SELECT * FROM libros WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo' AND eliminado = '0'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            // El producto ya existe
            echo "Advertencia: El producto ya existe en la base de datos.";
        } else {
            $sql = "INSERT INTO libros (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen')";
            
            if($conexion->query($sql)){
                echo "Datos agregados correctamente";
            }
            else{
                echo 'El Producto no pudo ser insertado =(';
            }
        }
    }
?>