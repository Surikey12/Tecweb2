<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Manejo de variable en PHP</title>
</head>
<body>
    <?php
        # Ejercicio 1: Imprimir arreglo de variables
        $variables = [
            '$_myvar => valida',  
            '$_7var => valida',  
            'myvar => invalida',
            '$myvar => valida',  
            '$var7 => valida',  
            '$_element1 => valida', 
            '$house*5 => invalida'
        ];
        echo "<p><strong>Array de Variables:</strong></p>";
        echo "<pre>";
        print_r($variables);
        echo "</pre>";

        # Ejercicio 2: Referencias en PHP
        echo "<p><strong>PHP Server (Referencias):</strong></p>";
        $a = "PHP server"; 
        $b = &$a; 
        $c = &$a;
        echo "<p>a: $a</p>";
        echo "<p>b: $b</p>";
        echo "<p>c: $c</p>";
        echo "<p>Este fragmento de código está utilizando referencias, lo que permite que dos variables apunten a la misma ubicación en memoria, de modo que un cambio en una de ellas afecta a la otra.</p>";

        # Ejercicio 3: Manipulación de strings y enteros
        echo "<p><strong>PHP5:</strong></p>";
        $a = "PHP5"; 
        echo "<p>$a</p>";
        $z[] = &$a; 
        echo "<pre>";
        print_r($z);
        echo "</pre>";
        $b = "5a version de PHP"; 
        echo "<p>$b</p>";
        $c = intval($b) * 10;
        echo "<p>Valor de c (entero): $c</p>";
        $a .= $b; 
        echo "<p>a después de concatenar: $a</p>";
        $b *= $c; 
        echo "<p>b multiplicado por c: $b</p>";
        $z[0] = "MySQL"; 
        echo "<p>z[0]: $z[0]</p>";

        # Ejercicio 4: Uso de $GLOBALS
        echo "<p><strong>Uso de \$GLOBALS:</strong></p>";
        $a = "PHP5"; 
        echo "<p>Valor de a en \$GLOBALS: {$GLOBALS['a']}</p>";
        $z[] = &$a; 
        foreach ($GLOBALS['z'] as $index => $value) {
            echo "<p>Valor de \$z[$index]: $value</p>";
        }

        # Ejercicio 5: Conversiones de tipos
        echo "<p><strong>Conversiones de tipos:</strong></p>";
        $a = "7 personas"; 
        $b = (integer) $a; 
        $a = "9E3"; 
        $c = (double) $a; 
        echo "<p>Valor de a: $a</p>";
        echo "<p>Valor de b (convertido a entero): $b</p>";
        echo "<p>Valor de c (convertido a double): $c</p>";

        # Ejercicio 6: Operadores booleanos
        echo "<p><strong>Valores booleanos:</strong></p>";
        $a = "0";  
        $b = "TRUE"; 
        $c = FALSE;  
        $d = ($a || $b);  
        $e = ($a && $c);  
        $f = ($a xor $b);
        echo "<p>Valores booleanos con var_dump():</p>";
        echo "<pre>";
        var_dump($a);  
        var_dump($b);  
        var_dump($c);  
        var_dump($d);  
        var_dump($e);  
        var_dump($f);
        echo "</pre>";
        echo "<p>Mostrar valores booleanos de forma legible:</p>";
        echo "<p>\$c: " . ($c ? 'TRUE' : 'FALSE') . "</p>";
        echo "<p>\$e: " . ($e ? 'TRUE' : 'FALSE') . "</p>";

        # Ejercicio 7: Información del servidor
        echo "<p><strong>Información del servidor:</strong></p>";
        if (isset($_SERVER['SERVER_SOFTWARE'])) {
            echo "<p>Versión de Apache: {$_SERVER['SERVER_SOFTWARE']}</p>";
        } else {
            echo "<p>No se pudo determinar la versión de Apache.</p>";
        }
        echo "<p>Versión de PHP: " . phpversion() . "</p>";
        echo "<p>Nombre del sistema operativo del servidor: " . php_uname() . "</p>";
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            echo "<p>Idioma del navegador (cliente): {$_SERVER['HTTP_ACCEPT_LANGUAGE']}</p>";
        } else {
            echo "<p>No se pudo determinar el idioma del navegador.</p>";
        }
    ?>
    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
</body>
</html>
