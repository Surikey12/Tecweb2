<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia Vehicular</title>
</head>

<body>

    <h1>CONSULTA VEHICULAR</h1>

    <form action= "matriculas.php" method="post">
        <label for="matricula">Consulta por matrícula:</label>
        <input type="text" id="matricula" name="matricula" required>
        <br><br>
        <button type="submit" name="consulta" value="matricula">Consultar</button>
        
        <button type="submit" name="consulta" value="todos">Mostrar todos los autos</button>
    </form>


    <?php
    include 'C:\xampp\htdocs\tecweb\practicas\p07\src\funciones_matriculas.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $consulta = $_POST['consulta'];

        if ($consulta === 'matricula') {
            $matricula = strtoupper($_POST['matricula']);
            Matricula($matricula);
        } elseif ($consulta === 'todos') {
            Carros();
        }
    }
    ?>

</body>

</html>