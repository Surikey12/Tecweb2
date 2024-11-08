<?php
    /*include_once __DIR__.'/database.php';
   
    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array();
    
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $id = $jsonOBJ->id;
        $sql = "UPDATE libros SET nombre= '{$jsonOBJ->nombre}', marca= '{$jsonOBJ->marca}', modelo= '{$jsonOBJ->modelo}', precio={$jsonOBJ->precio}, detalles= '{$jsonOBJ->detalles}', unidades= {$jsonOBJ->unidades},imagen= '{$jsonOBJ->imagen}' WHERE id= '$id'";
        if($conexion->query($sql)){
            $data['status'] =  "success";
            $data['message'] =  "Producto actualizado";
        } else {
            $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
        }
        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);*/

    namespace backend;
    require_once __DIR__ . '/myapi/Products.php';

    $productos = new \Products\Products('Libreria');
    $productos -> editProduct(file_get_contents('php://input'));
    echo $productos->getData();
?>