<?php
namespace MyApi\Update;

require_once __DIR__ . '/../DataBase.php';

use MyApi\DataBase;

class Update extends DataBase {
    // Atributo para almacenar la respuesta de las consultas
    protected $response;

    // Constructor con parámetros opcionales para inicializar la conexión a la BD
    public function __construct($dbname, $username = 'root', $password = '123_abc') {
        // Llamada al constructor de la clase padre (DataBase) para establecer la conexión
        parent::__construct($dbname, $username, $password);
        // Inicializa el atributo response como un arreglo vacío
        $this->response = [];
    }

    // Método para actualizar un producto
    public function editProduct($producto) {
        // Inicializa la respuesta por defecto
        $this->response = array(
            'status'  => 'error',
            'message' => 'ERROR: No se ejecutó la consulta de actualización.'
        );

        // Transforma el string JSON a objeto
        $jsonOBJ = json_decode($producto);

        if (!empty($jsonOBJ)) {
            $id = $jsonOBJ->id;
            // Define la consulta de actualización
            $sql = "UPDATE libros SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = '{$id}'";

            // Ejecuta la consulta
            if ($this->conexion->query($sql)) {
                $this->response['status'] = "success";
                $this->response['message'] = "Producto actualizado";
            } else {
                $this->response['message'] = "ERROR: No se ejecutó $sql. " . $this->conexion->error;
            }
        }
    }

    // Método para convertir el atributo response a JSON
    public function getData() {
        return json_encode($this->response);
    }

}
?>
