<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require 'vendor/autoload.php';

$app = new Slim\App();

#Metodo Slim normal
$app->get('/', function ($request, $response, $args){

    $response->write("Hola Mundo Slim");
    return $response;
});

#Metodo Slim con paso de parametros
$app->get("/hola[/{nombre}]", function($request, $response, $args){
    $response->write("Hola, ".$args["nombre"]);
    return $response;
});

#Metodo Slim usando el metodo Post
$app->post("/pruebapost", function($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"];
    $val2 = $reqPost["val2"];

    $response->write("Valores: ". $val1. " ". $val2 );
    return $response;

});

#Metodo Slim generando un Json
$app->post("/testjson", function($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $data[0]["nombre"]= $reqPost["val1"];
    $data[0]["apellidos"]= $reqPost["val2"];
    $data[1]["nombre"]= $reqPost["val3"];
    $data[1]["apellidos"]= $reqPost["val4"];
    $response->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});
$app->run();
?>