<?php
/* MySQL Conexion*/
$link = mysqli_connect("localhost", "root", "123_abc", "Libreria");
// Chequea coneccion
if($link === false){
die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}
// Ejecuta la actualizacion del registro
$sql = "UPDATE libros SET marca='contraluz' WHERE id=8";
if(mysqli_query($link, $sql)){
echo "Registro actualizado.";
} else {
echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
}
// Cierra la conexion
mysqli_close($link);
?>