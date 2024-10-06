<?php
/* MySQL Conexion*/
$link = mysqli_connect("localhost", "root", "123_abc", "Libreria");
// Chequea coneccion
if($link === false){
die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}
// Obtener los datos del formulario
$id = $_POST['id'];  
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$unidades = $_POST['unidad'];
$descripcion = $_POST['desc'];
$imagen = $_POST['img'];
// Ejecuta la actualizacion del registro
$sql = "UPDATE libros SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', unidades='$unidades', detalles='$descripcion', imagen='$imagen' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "Registro actualizado.";
} else {
echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
}
// Cierra la conexion
mysqli_close($link);
?>