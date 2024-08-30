        <hr/> 
            <?php 
                echo "<div><h1 style=\"border-width:3;border-style:groove; background-color: #ffcc99;\"> Final de la página PHP Vínculos útiles : <a href=\"php.net\">php.net</a> &nbsp; <a href=\"mysql.org\">mysql.org</a></h1>"; //Esta línea de código genera un encabezado dentro de un contenedor <div>. El encabezado tiene un borde estilizado y un fondo de color, y dentro de él se muestran dos enlaces.
                echo "Nombre del archivo ejecutado: ", $_SERVER['PHP_SELF'],"&nbsp;&nbsp; &nbsp;"; 
                echo "Nombre del archivo incluido: ", __FILE__ ,"</div>"; 
            ?> 
    </body> 
</html>