<?php
namespace MyApi\Delete;

require_once __DIR__ . '/../DataBase.php';

use MyApi\DataBase;

class Delete extends DataBase {
    // Atributo para almacenar la respuesta de las consultas
    protected $response;

    // Constructor con parámetros opcionales para inicializar la conexión a la BD
    public function __construct($dbname, $username = 'root', $password = '123_abc') {
        // Llamada al constructor de la clase padre (DataBase) para establecer la conexión
        parent::__construct($dbname, $username, $password);
        // Inicializa el atributo response como un arreglo vacío
        $this->response = [];
    }

    // Método para eliminar un producto (marcar como eliminado) usando su ID
    public function deleteProduct($id) {
        // Inicializa el arreglo de respuesta con un estado de error por defecto
        $this->response = [
            'status'  => 'error',
            'message' => 'La consulta falló'
        ];

        // Verifica que el ID no esté vacío
        if (!empty($id)) {
            $sql = "UPDATE libros SET eliminado = 1 WHERE id = {$id}";
        
            if ($this->conexion->query($sql)) {
                $this->response['status'] = "success";
                $this->response['message'] = "Producto eliminado";
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
