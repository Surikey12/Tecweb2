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
        include 'C:\xampp\htdocs\tecweb\practicas\p07\src\funciones.php';
        #Llamado a la función 1
        if(isset($_GET['numero']))
        {
            multiplo($_GET['numero']);
        }
        #Llamado a la función 2
        generarValores();
    ?>
</body>
</html>