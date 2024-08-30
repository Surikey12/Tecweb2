<?php 
    include("encabezado.inc.php"); //Se incluye el archivo pero, si el archivo no se encuentra o tiene error marcara un warning y seguira con la ejecución
    echo "<hr />"; 
    include_once("cuerpo.inc.php"); //Igual al include con la diferencia de que, si el archivo ya se incluyo una vez, ya no lo volvera a incluir
    require("cuerpo.html"); //Se incluye el archivo pero si este no se encuentra marcara un error fatal y detendra por completo el script
    require_once("pie.inc.php"); //Igual que el requiere, pero con la diferencia de que si ya incluyo el archivo ya no lo volvera a hacer. 
?>