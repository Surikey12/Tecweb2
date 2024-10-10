<!DOCTYPE html >
<html>
  <head>
    <meta charset="utf-8" >
    <title>Base de datos de libros</title>
    <style type="text/css">
        ol, ul { 
      list-style-type: none;
        }
    </style>

  </head>

  <script>
  function ValidarFormulario() {
    let nombre = document.getElementById('nombre').value.trim();
    let marca = document.getElementById('marca').value;
    let modelo = document.getElementById('modelo').value.trim();
    let precio = parseFloat(document.getElementById('precio').value);
    let unidad = parseInt(document.getElementById('unidad').value);
    let detalles = document.getElementById('desc').value.trim();
    let imagen = document.getElementById('img').value.trim();
    let defaultImage = "IMG/imagenDefecto.png"; // Ruta por defecto

    // Validar nombre
    if (nombre === "" || nombre.length > 100) {
      alert("El nombre es requerido y debe tener 100 caracteres o menos.");
      return false;
    }

    // Validar marca
    if (marca === "") {
      alert("Debe seleccionar una marca.");
      return false;
    }

    // Validar modelo
    let modelPattern = /^[a-zA-Z0-9]+$/;
    if (modelo === "" || !modelPattern.test(modelo) || modelo.length > 25) {
      alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
      return false;
    }

    // Validar precio
    if (isNaN(precio) || precio <= 99.99) {
      alert("El precio es requerido y debe ser mayor a 99.99.");
      return false;
    }

    // Validar unidades
    if (isNaN(unidad) || unidad < 0) {
      alert("Las unidades son requeridas y deben ser mayores o iguales a 0.");
      return false;
    }

    // Validar detalles
    if (detalles.length > 250) {
      alert("Los detalles deben tener 250 caracteres o menos.");
      return false;
    }

    // Validar imagen
    if (imagen === "") {
      //imagen = defaultImage;
      document.getElementById('img').value = defaultImage;
    }

    // Formulario válido
    return true;
  }

// Ejecutar la validación en el submit del formulario
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('formLib').addEventListener('submit', function(event) {
      if (!ValidarFormulario()) {
        event.preventDefault(); // Prevenir el envío del formulario si la validación falla
      }
    });
  });
</script>

  <body>
    
    <h1 style="text-align: center">Registro de LIBROS</h1>

    <h2><p>A continuación ingrese los datos del del libro:</p></h2>
    <form action="http://localhost/tecweb/practicas/p10/update_producto.php" method ="post" id= "formLib">
        <fieldset>
            <legend><p>Información del Producto</p></legend>
            <?php
              // Asigna el valor por defecto (puede venir de $_POST o $_GET)
              $selected_marca = !empty($_POST['marca']) ? $_POST['marca'] : (isset($_GET['marca']) ? $_GET['marca'] : '');
              $id = !empty($_POST['marca']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : '')
            ?>
            <ul>
            <!--Input para obtener el ID necesario-->
            <input type="hidden" name="id" value= <?= !empty($_POST['id'])?$_POST['id']:$_GET['id'] ?>>
            <li>Nombre del libro: <input type="text" name="nombre" id="nombre" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"> </li>
            <li>Marca del libro(Editorial): 
              <select name="marca" id="marca" required>
                <option value="acantilado" <?php if ($selected_marca == 'acantilado') echo 'selected'; ?>>Acantilado</option>
                <option value="akal" <?php if ($selected_marca == 'akal') echo 'selected'; ?>>Akal</option>
                <option value="aguilar" <?php if ($selected_marca == 'aguilar') echo 'selected'; ?>>Aguilar</option>
                <option value="alba" <?php if ($selected_marca == 'alba') echo 'selected'; ?>>Alba</option>
                <option value="alfaguara" <?php if ($selected_marca == 'alfaguara') echo 'selected'; ?>>Alfaguara</option>
                <option value="alianza" <?php if ($selected_marca == 'alianza') echo 'selected'; ?>>Alianza</option>
                <option value="almadia" <?php if ($selected_marca == 'almedita') echo 'selected'; ?>>Almadia</option>
                <option value="anagrama" <?php if ($selected_marca == 'anagrama') echo 'selected'; ?>>Anagrama</option>
                <option value="atlanta" <?php if ($selected_marca == 'atlanta') echo 'selected'; ?>>Atlanta</option>
                <option value="ariel" <?php if ($selected_marca == 'ariel') echo 'selected'; ?>>Ariel</option>
                <option value="austral" <?php if ($selected_marca == 'austral') echo 'selected'; ?>>Austral</option>
                <option value="booket" <?php if ($selected_marca == 'booket') echo 'selected'; ?>>Booket</option>
                <option value="cajanegra" <?php if ($selected_marca == 'cajanegra') echo 'selected'; ?>>Caja Negra</option>
                <option value="catedra" <?php if ($selected_marca == 'catedra') echo 'selected'; ?>>Catedra</option>
                <option value="critica" <?php if ($selected_marca == 'critica') echo 'selected'; ?>>Critica</option>
                <option value="crossbooks" <?php if ($selected_marca == 'crossbooks') echo 'selected'; ?>>CrossBooks</option>
                <option value="cupula" <?php if ($selected_marca == 'cupula') echo 'selected'; ?>>Cúpula</option>
                <option value="debolsillo" <?php if ($selected_marca == 'debolsillo') echo 'selected'; ?>>Debolsillo</option>
                <option value="espasa" <?php if ($selected_marca == 'espasa') echo 'selected'; ?>>Espasa</option>
                <option value="destino" <?php if ($selected_marca == 'destino') echo 'selected'; ?>>Ediciones Destino</option>
                <option value="paidos" <?php if ($selected_marca == 'paidos') echo 'selected'; ?>>Ediciones Paidos</option>
                <option value="escencia" <?php if ($selected_marca == 'escencia') echo 'selected'; ?>>Escencia</option>
                <option value="galaxia" <?php if ($selected_marca == 'galaxia') echo 'selected'; ?>>Galaxia Gutenberg</option>
                <option value="gredos" <?php if ($selected_marca == 'gredos') echo 'selected'; ?>>Gredos</option>
                <option value="geoplaneta" <?php if ($selected_marca == 'geoplaneta') echo 'selected'; ?>>GeoPlaneta</option>
                <option value="herder" <?php if ($selected_marca == 'herder') echo 'selected'; ?>>Herder</option>
                <option value="impedi" <?php if ($selected_marca == 'impedi') echo 'selected'; ?>>Impedimenta</option>
                <option value="esfera" <?php if ($selected_marca == 'esfera') echo 'selected'; ?>>La esfera de los libros</option>
                <option value="lAmerica" <?php if ($selected_marca == 'lAmerica') echo 'selected'; ?>>Library of America</option>
                <option value="lumen" <?php if ($selected_marca == 'lumen') echo 'selected'; ?>>Lumen</option>
                <option value="disney" <?php if ($selected_marca == 'disney') echo 'selected'; ?>>Libros Disney</option>
                <option value="minotauro" <?php if ($selected_marca == 'minotauro') echo 'selected'; ?>>Minotauro</option>
                <option value="M Tusquets Editores" <?php if ($selected_marca == 'M Tusquets Editores') echo 'selected'; ?>>Maxi Tusquets Editores</option>
                <option value="nevsky" <?php if ($selected_marca == 'nevsky') echo 'selected'; ?>>Nevsky</option>
                <option value="novela" <?php if ($selected_marca == 'novela') echo 'selected'; ?>>N de novela</option>
                <option value="olañeta" <?php if ($selected_marca == 'olañeta') echo 'selected'; ?>>Olañeta</option>
                <option value="paidos" <?php if ($selected_marca == 'paidos') echo 'selected'; ?>>Paidos</option>
                <option value="penguin books" <?php if ($selected_marca == 'penguin books') echo 'selected'; ?>>Penguin Books</option>
                <option value="planeta" <?php if ($selected_marca == 'planeta') echo 'selected'; ?>>Planeta</option>
                <option value="lector" <?php if ($selected_marca == 'lector') echo 'selected'; ?>>Planeta Lector</option>
                <option value="peninsula" <?php if ($selected_marca == 'peninsula') echo 'selected'; ?>>Peninsula</option>
                <option value="rm" <?php if ($selected_marca == 'rm') echo 'selected'; ?>>RM</option>
                <option value="sajalin" <?php if ($selected_marca == 'sajalin') echo 'selected'; ?>>Sajalin</option>
                <option value="salamandra" <?php if ($selected_marca == 'salamandra') echo 'selected'; ?>>Salmandra</option>
                <option value="satori" <?php if ($selected_marca == 'satori') echo 'selected'; ?>>Satori</option>
                <option value="sexto" <?php if ($selected_marca == 'sexto') echo 'selected'; ?>>Sexto Piso</option>
                <option value="sigloxxi" <?php if ($selected_marca == 'sigloxxi') echo 'selected'; ?>>Siglo XXI</option>
                <option value="siruela" <?php if ($selected_marca == 'siruela') echo 'selected'; ?>>Siruela</option>
                <option value="taschen" <?php if ($selected_marca == 'taschen') echo 'selected'; ?>>Taschen</option>
                <option value="taurus" <?php if ($selected_marca == 'taurus') echo 'selected'; ?>>Taurus</option>
                <option value="trotta" <?php if ($selected_marca == 'trotta') echo 'selected'; ?>>Trotta</option>
                <option value="E_tusquets" <?php if ($selected_marca == 'E_tusquets') echo 'selected'; ?>>Tusuqets Editores</option>
                <option value="urano" <?php if ($selected_marca == 'urano') echo 'selected'; ?>>Urano</option>
                <option value="valdemar" <?php if ($selected_marca == 'valdemar') echo 'selected'; ?>>Valdemar</option>
                <option value="zafiro" <?php if ($selected_marca == 'zafiro') echo 'selected'; ?>>Zafiro</option>
              </select>
            </li>
            <li>Modelo: <input type="text" name="modelo" id="modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"> </li>
            <li>Precio: <input type="number" step="any" name="precio" id="precio" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"> </li>
            <li>Unidades: <input type="number" name="unidad" min="0" id="unidad" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"> </li>
            <li>Descripción <br> 
            <textarea name="desc" id="desc" rows="4" cols="60" placeholder="Ejemplo: Color, tamaño, diseño, etc."><?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?></textarea>
            </li>
            <li>Imagen: <br>
                <textarea name="img" id="img" rows="4" cols="60" maxlength="1000" placeholder="Ingrese url de la Imagen: http://example.com/image.jpg" ><?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?></textarea>
            </li>
            <img id="imagen" src="IMG/imagenDefecto.png" style="display: none;">
            </ul>
        </fieldset>
        <div style="text-align: center">
            <input type="submit" value="Agregar Producto"> 
            <input type="reset" value="Limpiar">
        </div>
    </form>
    <script>
        function validateURL() {
            var imageUrl = document.getElementById('img').value;
            var allowedExtensions = /\.(jpg|jpeg|png|gif)$/i;
        
            if (!allowedExtensions.test(imageUrl)) {
                alert('Por favor, ingresa una URL de una imagen con extensión .jpg, .jpeg, .png, o .gif.');
                return false;
            }
            
            return true;
        }
    </script>
  </body>
</html>
