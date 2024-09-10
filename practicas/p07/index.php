<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    
    <h2>Calcular multiplos de 5 y 7</h2>
    <form action="http://localhost/tecweb/practicas/p07/src/funciones.php?numero=10" method="post">
        Ingresa un número: <input type="text" name="numero"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>