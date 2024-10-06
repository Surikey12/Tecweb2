<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos con Unidades hasta el Tope</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function show() {
            // se obtiene el id de la fila donde está el botón presinado
            var rowId = event.target.parentNode.parentNode.id;

            // se obtienen los datos de la fila en forma de arreglo
            var data = document.getElementById(rowId).querySelectorAll(".row-data");
            /**
            querySelectorAll() devuelve una lista de elementos (NodeList) que 
            coinciden con el grupo de selectores CSS indicados.
            (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

            En este caso se obtienen todos los datos de la fila con el id encontrado
            y que pertenecen a la clase "row-data".
            */
            var id = rowId.split('_')[1];
            var name = data[0].innerHTML;
            var marca = data[1].innerHTML;
            var modelo = data[2].innerHTML;
            var precio = data[3].innerHTML;
            var unidades = data[4].innerHTML;
            var detalles = data[5].innerHTML;
            var imagen = data[6].innerHTML;

            alert("Libro: " + name + "\nEditorial: " + marca + "\nModelo: " + modelo + "\nPrecio: " + precio +"\nDetalles: "+detalles+"\nImagen: "+imagen);

            send2form(id, name, marca, modelo, precio, unidades, detalles, imagen);
        }
    </script>
</head>
<body>
    <h3>Productos con Unidades Menores o Iguales al Tope</h3>

    <br/>

    <?php
    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('<p style="color: red;">Parámetro "tope" no detectado...</p>');
    }

    if (!empty($tope)) {
        // SE CREA EL OBJETO DE CONEXION
        @$link = new mysqli('localhost', 'root', '123_abc', 'Libreria');
        
        // comprobar la conexión
        if ($link->connect_errno) {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        // Consulta a la base de datos
        if ($result = $link->query("SELECT * FROM libros WHERE unidades <= $tope")) {
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
                            <th scope="col">Verificar</th>
                        </tr>
                    </thead>
                    <tbody>';

                // Recorremos cada registro obtenido de la consulta
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '
                    <tr id = "row_' . $row['id'] . '">
                        <th scope="row">' . $row['id'] . '</th>
                        <td class="row-data">' . $row['nombre'] . '</td>
                        <td class="row-data">' . $row['marca'] . '</td>
                        <td class="row-data">' . $row['modelo'] . '</td>
                        <td class="row-data">' . $row['precio'] . '</td>
                        <td class="row-data">' . $row['unidades'] . '</td>
                        <td class="row-data">' . utf8_encode($row['detalles']) . '</td>
                        <td class="row-no-data"><img src="' . $row['imagen'] . '" alt="Imagen del producto" width="100"></td>
                        <td class="row-data" style="display:none;><' . $row['imagen'] . '></td>
                        <td><input type="button" value="submit" onclick="show()" /></td>
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
    <script>
        function send2form(id, name, marca, modelo, precio, unidades, detalles, imagen) {     //form) { 
            var urlForm = "http://localhost/tecweb/practicas/p10/formulario_productos_v2.php";
            var propId = "id="+ id;
            var propName = "nombre="+name;
            var propMarca = "marca="+marca;
            var propModelo = "modelo="+modelo;
            var propPrecio = "precio="+precio;
            var propUnidades = "unidades="+unidades;
            var propDeta = "detalles="+detalles;
            var propImg = "imagen="+imagen;
            window.open(urlForm+"?"+propId+"&"+propName+"&"+propMarca+"&"+propModelo+"&"+propPrecio+"&"+propUnidades+"&"+propDeta+"&"+propImg);
        }
    </script>
</body>
</html>
