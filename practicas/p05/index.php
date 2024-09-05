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
        echo '<br><br>';

        #Ejercicio 5
        $a = "7 personas"; 
        $b = (integer) $a; 
        $a = "9E3"; 
        $c = (double) $a; 

        print_r($a); echo '<br>';
        print_r($b); echo '<br>';
        print_r($c); echo '<br>';

        #Ejercicio 6
        $a = "0";  
        $b = "TRUE"; 
        $c = FALSE;  
        $d = ($a || $b);  
        $e = ($a && $c);  
        $f = ($a xor $b);
        echo "Valores booleanos con var_dump():<br>";
        var_dump($a);  // Mostrará el tipo y valor de $a
        echo '<br>';
        var_dump($b);  // Mostrará el tipo y valor de $b
        echo '<br>';
        var_dump($c);  // Mostrará el tipo y valor de $c
        echo '<br>';
        var_dump($d);  // Mostrará el tipo y valor de $d
        echo '<br>';
        var_dump($e);  // Mostrará el tipo y valor de $e
        echo '<br>';
        var_dump($f);  // Mostrará el tipo y valor de $f
        echo '<br>';
        // Para mostrar los valores booleanos con echo, transformamos los valores de $c y $e

        // Usamos la función boolval() para asegurarnos de que sean booleanos
        // Usamos un operador ternario para transformarlos en algo que se pueda mostrar con echo
        echo "<br>Mostrar valores booleanos de forma legible:<br>";
        echo "\$c: " . ($c ? 'TRUE' : 'FALSE') . "<br>";  // Mostrará 'FALSE'
        echo "\$e: " . ($e ? 'TRUE' : 'FALSE') . "<br>";  // Mostrará 'FALSE'
    ?>
</body>
</html>