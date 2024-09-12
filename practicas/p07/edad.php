<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <h2>Comprobar edad</h2>
        <form action="edad.php" method="post">
            Edad: <input type="text" name="edad"><br>
            Sexo: 
            <select name= "sexo" size ="1">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
            <input type="submit" value ="Confirmar">
        </form>
        <?php
            if(isset($_POST["edad"]) && isset($_POST["sexo"]))
            {
                $edad = $_POST["edad"];
                $sexo = $_POST["sexo"];
                if($sexo == 'F'){
                    if($edad >=18 && $edad <= 35){
                        echo "Bienvenida, usted esta en el rango de edad permitido";
                    }
                    elseif($edad < 18 || $edad >35){
                        echo "Usted no esta en el rango permitido";
                    }
                }else{
                    echo "Usted es hombre, no puede entrar";
                }
            }
        ?>
    </body>
</html>

