<?php
namespace MyApi\Read;

require_once __DIR__ . '/../DataBase.php';

use MyApi\DataBase;

class Read extends DataBase {
    // Atributo para almacenar la respuesta de las consultas
    protected $response;

    // Constructor con parámetros opcionales para inicializar la conexión a la BD
    public function __construct($dbname, $username = 'root', $password = '123_abc') {
        // Llamada al constructor de la clase padre (DataBase) para establecer la conexión
        parent::__construct($dbname, $username, $password);
        // Inicializa el atributo response como un arreglo vacío
        $this->response = [];
    }

    // Método para listar productos
    public function listProducts() {
        // Limpia el array response
        $this->response = [];

        // Realiza la consulta de búsqueda
        if ($result = $this->conexion->query("SELECT * FROM libros WHERE eliminado = 0")) {
            // Obtiene los resultados
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // Codifica los datos a UTF-8 y los agrega al array de respuesta
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . $this->conexion->error);
        }
    }

    // Método para buscar productos por ID, nombre, marca o detalles
    public function searchProducts($search) {
        // Limpia el array response
        $this->response = [];

        // Realiza la consulta de búsqueda
        $sql = "SELECT * FROM libros WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
        if ($result = $this->conexion->query($sql)) {
            // Obtiene los resultados
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // Codifica los datos a UTF-8 y los agrega al array de respuesta
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . $this->conexion->error);
        }
    }

    // Método para buscar un producto por su ID
    public function singleId($id) {
        $this->response = [];

        // Realiza la consulta de búsqueda por ID
        $sql = "SELECT * FROM libros WHERE id = $id";
        if ($result = $this->conexion->query($sql)) {
            // Obtiene los resultados
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // Codifica los datos a UTF-8 y excluye el campo 'eliminado'
                foreach ($rows as $num => $row) {
                    unset($row['eliminado']); // Excluye el campo eliminado
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . $this->conexion->error);
        }
    }

    // Método para buscar un producto por su nombre
    public function singleByName($productName) {
        $this->response = [];

        // Realiza la consulta de búsqueda por nombre
        $sql = "SELECT * FROM libros WHERE nombre = '{$productName}' AND eliminado = 0";
        if ($result = $this->conexion->query($sql)) {
            // Obtiene los resultados
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // Codifica los datos a UTF-8 y los mapea en el arreglo de respuesta
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . $this->conexion->error);
        }
    }

    // Método para convertir el atributo response a JSON
    public function getData() {
        return json_encode($this->response);
    }

}
?>
