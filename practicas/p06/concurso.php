<?php
// Captura de los datos del formulario
$nombre = $_POST['name'];
$email = $_POST['email'];
$telefono = $_POST['phone'];
$historia = $_POST['story'];
$color = $_POST['color'];
$tamano = $_POST['size'];
?>

<!-- Muestra de la información en la página-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concurso de Tenis - Confirmación</title>
    <style>
        body { background-color: #e2f0d9; font-family: Arial, sans-serif; color: #333; }
        h1 { color: #3c763d; }
        p { font-size: 18px; }
    </style>
</head>
<body>
    <h1>MUCHAS GRACIAS</h1>
    <p>Gracias por entrar al concurso de Tenis Mike® 'Chidos mis Tenis'. Hemos recibido la siguiente información de tu registro:</p>
    <h2>Acerca de ti:</h2>
    <ul>
        <li><b>Nombre:</b> <?php echo $nombre; ?></li>
        <li><b>E-mail:</b> <?php echo $email; ?></li>
        <li><b>Teléfono:</b> <?php echo $telefono; ?></li>
    </ul>
    <h2>Tu triste historia:</h2>
    <p><?php echo $historia; ?></p>
    <h2>Tu diseño de Tenis (si ganas):</h2>
    <ul>
        <li><b>Color:</b> <?php echo $color; ?></li>
        <li><b>Tamaño:</b> <?php echo $tamano; ?></li>
    </ul>
</body>
</html>