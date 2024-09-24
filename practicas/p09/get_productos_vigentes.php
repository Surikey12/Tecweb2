<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos con Unidades hasta el Tope</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>Productos en existencia o agotados</h3>

    <br/>

    <?php
    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('<p style="color: red;">Parámetro "tope" no detectado...</p>');
    }

    if (!empty($tope)) {
        // SE CREA EL OBJETO DE CONEXION
        @$link = new mysqli('localhost', 'root', '123_abc', 'marketzone');
        
        // comprobar la conexión
        if ($link->connect_errno) {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        // Consulta a la base de datos
        if ($result = $link->query("SELECT * FROM productos WHERE eliminado < $tope")) {
            if($result->num_rows > 0) {
                // Mostrar tabla con los productos
                echo '
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Detalles</th>
                            <th scope="col">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>';

                // Recorremos cada registro obtenido de la consulta
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '
                    <tr>
                        <th scope="row">' . $row['id'] . '</th>
                        <td>' . $row['nombre'] . '</td>
                        <td>' . $row['marca'] . '</td>
                        <td>' . $row['modelo'] . '</td>
                        <td>' . $row['precio'] . '</td>
                        <td>' . $row['unidades'] . '</td>
                        <td>' . utf8_encode($row['detalles']) . '</td>
                        <td><img src="' . $row['imagen'] . '" alt="Imagen del producto" width="100"></td>
                    </tr>';
                }

                echo '
                    </tbody>
                </table>';
            } else {
                echo '<p>No se encontraron productos con unidades menores o iguales a ' . $tope . '.</p>';
            }

            // Liberar el resultado
            $result->free();
        }

        // Cerrar la conexión
        $link->close();
    }
    ?>
</body>
</html>
