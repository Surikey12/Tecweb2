<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    
    // VERIFICAR SI SE RECIBIÓ UN ID O UN NOMBRE
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // BÚSQUEDA POR ID
        $id = $_POST['id'];
        $query = "SELECT * FROM libros WHERE id = '{$id}'";

        if ($result = $conexion->query($query)) {
            // SE OBTIENEN LOS RESULTADOS
			$row = $result->fetch_array(MYSQLI_ASSOC);

            if(!is_null($row)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($row as $key => $value) {
                    $data[$key] = utf8_encode($value);
                }
            }
			$result->free();
        } else {
            die('Query Error: ' . mysqli_error($conexion));
        }
    } elseif (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        // BÚSQUEDA POR NOMBRE
        $nombre = $_POST['nombre'];
        $query = "SELECT * FROM libros WHERE nombre LIKE '%$nombre%'";

        if ($result = $conexion->query($query)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $data[] = array_map('utf8_encode', $row);
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($conexion));
        }
    }
    $conexion->close();
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>