<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<?php // inicio de un bloque de código PHP. Todo lo que esté dentro de <?php sera procesado como codigo php 
    $variable1=" PHP 5"; 
?> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es"> 
    <head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <?php //← Bloque de php, aqui se utiliza PHP para generar el contenido del <title> de la página HTML
            echo "<title>Una pagina llena de scripts PHP</title>"; 
        ?> 
    </head>
    <body> 
        <script language="php"> //Esta es una manera alternativa de escribir código PHP dentro de un bloque de <script>
            echo "<h1> BUENO DIAS A TODOS </h1>"; 
        </script> 
        <?php //Otro bloque de código PHP. 
            echo "<h2> Titulo escrito por PHP </h2>"; //Aquí se imprime un encabezado <h2> con el texto "Titulo escrito por PHP" y se asigna el valor "MySQL" a la variable $variable2
            $variable2="MySQL"; 
        ?> 
        <p>Vas a descubrir <?= $variable1 ?> <!--Imprime el valor de la variable $variable1 directamente dentro del HTML.--></p> 
        <?php // Imprime un encabezado <h2> con el texto "Buenos días de PHP 5", utilizando el valor de la variable $variable1.
            echo "<h2> Buenos días de $variable1 </h2>"; 
        ?> 
        <p> Utilización de variables PHP <br/> Vas a descubrir igualmente 
        <?php //Aquí se utiliza PHP para imprimir el valor de la variable $variable2 dentro del párrafo
            echo $variable2; 
        ?> 
        </p> 
        <?= "<div><big> Buenos días de $variable2 </big></div>" ?> <!--Este bloque de PHP imprime un <div> con un texto resaltado que dice "Buenos días de MySQL", utilizando el valor de la variable $variable2-->
    </body>
</html>