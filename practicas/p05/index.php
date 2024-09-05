<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Manejo de variable en PHP</title>
</head>
<body>
    <?php

        #ejercicio 1
        $variables = [
            '$_myvar => valida',  
            '$_7var => valida',  
            'myvar => invalida',
            '<br>', 
            '$myvar => valida',  
            '$var7 => valida',  
            '$_element1 => valida', 
            '$house*5 => invalida'
        ];

        print_r($variables);
        echo '<br>';
        #Ejercicio 2
        $a = "PHP server"; 
        $b = &$a; 
        $c = &$a;
        print_r($a);
        echo '<br>';
        print_r($b);
        echo '<br>';
        print_r($c);
        echo '<br>';
        echo 'Este fragmento de código está utilizando referencias lo que permite que dos variables<br> apunten a la misma ubicación en memoria, de modo que un cambio en una de ellas afecta a la otra.';
    ?>
</body>
</html>