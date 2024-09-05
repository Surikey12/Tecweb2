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

        echo '<br><br>';
        #Ejercicio 3
        $a = "PHP5"; 
        print_r($a);
        echo '<br>';
        $z[] = &$a; 
        print_r($z);
        echo '<br>';
        $b = "5a version de PHP"; 
        print_r($b);
        echo '<br>';
        $c = $b*10;
        print_r($c); 
        echo '<br>';
        $a .= $b; 
        print_r($a);
        echo '<br>';
        $b *= $c; 
        print_r($b);
        echo '<br>';
        $z[0] = "MySQL"; 
        print_r($z[0]);
        echo '<br><br>';

        #Ejercicio 4
        $a = "PHP5"; 
        echo $GLOBALS["a"];
        echo '<br>';
        $z[] = &$a; 
        foreach ($GLOBALS['z'] as $index => $value) {
            echo "Valor de \$z[$index]: " . $value . "<br>";
        }
        echo '<br>';
        $b = "5a version de PHP"; 
        echo $GLOBALS["b"];
        echo '<br>';
        $c = $b*10;
        echo $GLOBALS["c"]; 
        echo '<br>';
        $a .= $b; 
        echo $GLOBALS["a"];
        echo '<br>';
        $b *= $c; 
        echo $GLOBALS["b"];
        echo '<br>';
        $z[0] = "MySQL"; 
        echo $GLOBALS["z"][0];
    ?>
</body>
</html>