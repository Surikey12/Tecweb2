<?php
    function multiplo($num){
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
    }

    function generarValores() {
        $matrix = []; // Matriz para almacenar los valores generados
        $iteraciones = 0; // Contador de iteraciones
        $numerosGenerados = 0; // Contador de números generados

        while (true) {
            // Generar tres valores aleatorios entre 1 y 100
            $valores = [
                rand(1, 500),  // Primer número (debe ser impar)
                rand(1, 500),  // Segundo número (debe ser par)
                rand(1, 500)   // Tercer número (debe ser impar)
            ];
            
            $matrix[] = $valores;// Añadir los valores a la matriz
            $iteraciones++; // Incrementar el número de iteraciones
            $numerosGenerados += 3;

            if ($valores[0] % 2 == 1 && $valores[1] % 2 == 0 && $valores[2] % 2 == 1) {
                // Si se cumple la condición, salir del bucle
                break;
            }
        }

        // Mostrar la matriz generada
        echo "<h2>Creacion de una matriz aleatoria</h2>";
        echo "<h3>Matriz generada:</h3>";
        echo "<pre>";
        print_r($matrix);
        echo "</pre>";

        // Mostrar el número de iteraciones y números generados
        echo "<h3>Iteraciones: $iteraciones</h3>";
        echo "<h3>Números generados: $numerosGenerados</h3>";
    }

    function entero($nume){
        echo  "<h3>Respuesta con while</h3>";
        while(true){
            $numero = rand(1,500);
            if($numero%$nume == 0){
                echo "El valor $numero es multiplo de $nume";
                break;
            }
        }
        echo  "<h3>Respuesta con do-while</h3>";
        do{
            $numero = rand(1,500);
            $val = $numero%$nume;
            if($val == 0){
                echo "El valor $numero es multiplo de $nume";
            }
        } while($val!=0);
    }

    function ascii(){
        $arreglo = array();
        for ($i = 97; $i <= 122; $i++) {
            $arreglo[$i] = chr($i);
        }
        return $arreglo;
    }
?>