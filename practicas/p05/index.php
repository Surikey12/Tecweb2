<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Manejo de variable en PHP</title>
</head>
<body>
    <?php
        $a = "ManejadorSQL"; 
        $b = 'MySQL'; 
        $c = &$a;
        print_r($a);
        echo '<br>';
        print_r($b);
        echo '<br>';
        print_r($c);
    ?>
</body>
</html>