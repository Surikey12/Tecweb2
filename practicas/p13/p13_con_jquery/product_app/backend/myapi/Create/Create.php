<?php
namespace MyApi\Create;

require_once __DIR__ . '/../DataBase.php';

use MyApi\DataBase;

class Create extends DataBase {
    // Atributo para almacenar la respuesta de las consultas
    protected $response;

    // Constructor con parámetros opcionales para inicializar la conexión a la BD
    public function __construct($dbname, $username = 'root', $password = '123_abc') {
        // Llamada al constructor de la clase padre (DataBase) para establecer la conexión
        parent::__construct($dbname, $username, $password);
        // Inicializa el atributo response como un arreglo vacío
        $this->response = [];
    }

     // Método para agregar un nuevo producto
    public function addProduct($product) {
        // Decodifica el JSON recibido para obtener los datos del producto
        $jsonOBJ = json_decode($product);
        
        // Resultado por defecto si ya existe el producto
        $this->response = [
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        ];

        // Verifica si el producto ya existe en la base de datos
        $consulta = "SELECT * FROM libros WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
        $result = $this->conexion->query($consulta);

        if ($result->num_rows == 0) {
            // Si no existe el producto, insertarlo
            $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO libros (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                    VALUES ('{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, 
                            '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
            if ($this->conexion->query($sql)) {
                $this->response['status'] = "success";
                $this->response['message'] = "Producto agregado";
            } else {
                $this->response['message'] = "ERROR: No se ejecutó $sql. " . $this->conexion->error;
            }
        }
        $result->free();
    }

    // Método para convertir el atributo response a JSON
    public function getData() {
        return json_encode($this->response);
    }

}
?>
