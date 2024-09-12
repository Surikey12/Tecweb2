<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    
    <h2>Ejemplo de POST</h2>
    <form action="index.php" method="get">
        Número: <input type="text" name="numero"><br>
        <input type="submit" value ="Confirmar">
    </form>
    <br>
    <?php
        include_once 'C:\xampp\htdocs\tecweb\practicas\p07\src\funciones.php';
        #Llamado a la función 1
        if(isset($_GET['numero']))
        {
            multiplo($_GET['numero']);
        }
        #Llamado a la función 2
        generarValores();

    ?>
    <!--Esta es la función 3-->
    <h2>Primer numero entero</h2>
    <form action="index.php" method="get">
        Número: <input type="text" name="num"><br>
        <input type="submit" value ="Confirmar">
    </form>
    <?php
        include_once 'C:\xampp\htdocs\tecweb\practicas\p07\src\funciones.php';
        #Llamado a la función 3
        if(isset($_GET['num']))
        {
            entero($_GET['num']);
        }
    ?>
    <br>
    <?php
        include_once 'C:\xampp\htdocs\tecweb\practicas\p07\src\funciones.php';
        $arreglo = ascii();
        echo "<h2>Tabla de valores ASCII</h2>";
        echo '<table border="1">';
        echo '<tr><th>Índice</th><th>Valor</th></tr>';
        // Recorrer el arreglo y generar las filas de la tabla
        foreach ($arreglo as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>
    <br>
</body>
</html>