<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require 'vendor/autoload.php'; // Slim Framework
require_once __DIR__ . '/MyApi/Create/Create.php';
require_once __DIR__ . '/MyApi/Read/Read.php';
require_once __DIR__ . '/MyApi/Update/Update.php';
require_once __DIR__ . '/MyApi/Delete/Delete.php';

use MyApi\Create\Create;
use MyApi\Read\Read;
use MyApi\Update\Update;
use MyApi\Delete\Delete;

$app = new Slim\App();

// Configuración de base de datos
$dbName = 'Libreria'; 

$create = new Create($dbName);
$read = new Read($dbName);
$update = new Update($dbName);
$delete = new Delete($dbName);

// Ruta base
$app->get('/', function ($request, $response, $args) {
    $response->write("API de Productos funcionando");
    return $response;
});

// Listar todos los productos
$app->get('/productos', function ($request, $response, $args) use ($read) {
    $read->listProducts();
    $data = $read->getData();
    return $response->write($data);
});

// Buscar productos
$app->post('/productos/buscar', function ($request, $response, $args) use ($read) {
    $reqPost = $request->getParsedBody();
    $search = $reqPost['search'] ?? '';
    $read->searchProducts($search);
    $data = $read->getData();
    return $response->write($data);
});

// Buscar un producto específico por ID para editar
$app->get('/productos/{id}', function ($request, $response, $args) use ($read) {
    $id = $args['id'];
    $read->singleId($id);
    $data = $read->getData();
    return $response->write($data);
});

// Busqueda de nombre para Validacion
$app->post('/productos/buscarNombre', function ($request, $response, $args) use ($read) {
    $reqPost = $request->getParsedBody();
    $name = $reqPost['name'] ?? ''; // Para /productos/buscarNombre
    $read->singleByName($name);
    $data = $read->getData();
    return $response->write($data);
});

// Agregar un nuevo producto
$app->post('/productos/agregar', function ($request, $response, $args) use ($create) {
    $product = file_get_contents('php://input');
    $create->addProduct($product);
    $data = $create->getData();
    return $response->write($data);
});

// Editar un producto
$app->post('/productos/actualizar', function ($request, $response, $args) use ($update) {
    $product = file_get_contents('php://input');
    $update->editProduct($product);
    $data = $update->getData();
    return $response->write($data);
});

// Eliminar un producto por ID (estructurado como archivo individual)
$app->post('/productos/eliminar', function ($request, $response, $args) use ($delete) {
    $reqPost = $request->getParsedBody();
    $id = $reqPost['id'] ?? ''; // Para /productos/buscarNombre
    $delete->deleteProduct($id);
    $data = $delete->getData();
    return $response->write($data);
});

$app->run();
