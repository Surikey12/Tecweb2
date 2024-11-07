<?php
namespace Products;

require_once __DIR__ . '/DataBase.php';

use DataBase;

class Products extends DataBase {
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
        $consulta = "SELECT * FROM libros WHERE nombre = :nombre AND eliminado = 0";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $jsonOBJ->nombre);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            // Si no existe, procede a insertar el nuevo producto
            $insertar = "INSERT INTO libros (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                         VALUES (:nombre, :marca, :modelo, :precio, :detalles, :unidades, :imagen, 0)";
            
            $stmtInsert = $this->conexion->prepare($insertar);
            $stmtInsert->bindParam(':nombre', $jsonOBJ->nombre);
            $stmtInsert->bindParam(':marca', $jsonOBJ->marca);
            $stmtInsert->bindParam(':modelo', $jsonOBJ->modelo);
            $stmtInsert->bindParam(':precio', $jsonOBJ->precio);
            $stmtInsert->bindParam(':detalles', $jsonOBJ->detalles);
            $stmtInsert->bindParam(':unidades', $jsonOBJ->unidades);
            $stmtInsert->bindParam(':imagen', $jsonOBJ->imagen);

            if ($stmtInsert->execute()) {
                // Si se insertó correctamente, actualiza la respuesta
                $this->response['status'] = 'success';
                $this->response['message'] = 'Producto agregado';
            } else {
                $this->response['message'] = 'ERROR: No se pudo ejecutar la inserción';
            }
        }
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
            // Prepara y ejecuta la consulta de actualización
            $sql = "UPDATE libros SET eliminado = 1 WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Si la consulta fue exitosa, actualiza la respuesta
                $this->response['status'] = 'success';
                $this->response['message'] = 'Producto eliminado';
            } else {
                // Si falló, almacena el mensaje de error
                $this->response['message'] = 'ERROR: No se pudo ejecutar la consulta de eliminación';
            }
        }
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
        try {
            // Consulta para obtener el producto por nombre
            $stmt = $this->conexion->prepare("SELECT * FROM libros WHERE nombre = :nombre");
            $stmt->bindParam(':nombre', $productName);
            $stmt->execute();
            
            // Almacena el resultado en el atributo response
            $this->response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // Método para convertir el atributo response a JSON
    public function getData() {
        return json_encode($this->response);
    }

}
?>
