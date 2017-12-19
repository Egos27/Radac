<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require '../composer/vendor/autoload.php';
require_once 'clases/AccesoDatos.php';
require_once 'clases/usuario/usuario.php';
require_once 'clases/usuario/usuarioApi.php';
require_once 'clases/registro/registro.php';
require_once 'clases/registro/registroApi.php';
require_once 'middel/AutentificadorJWT.php';
require_once 'middel/MWparaCORS.php';
require_once 'middel/MWparaAutentificar.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['determineRouteBeforeAppMiddleware'] = true;

$app = new \Slim\App(["settings" => $config]);



/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/

$app->group('/usuario', function () {
 
  $this->get('/', \usuarioApi::class . ':traerTodos')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
 
  $this->get('/{id}', \usuarioApi::class . ':traerUno')->add(\MWparaCORS::class . ':HabilitarCORSTodos');

  $this->post('/', \usuarioApi::class . ':CargarUno');

  $this->delete('/', \usuarioApi::class . ':BorrarUno');

  $this->put('/', \usuarioApi::class . ':ModificarUno');
     
})->add(\MWparaAutentificar::class . ':VerificarUsuario')->add(\MWparaCORS::class . ':HabilitarCORSTodos  ');

$app->group('/registro', function () {
  
   $this->get('/', \registroApi::class . ':traerTodos')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
  
   $this->get('/{id}', \registroApi::class . ':traerUno')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
 
   $this->post('/', \registroApi::class . ':CargarUno');
 
   $this->delete('/', \registroApi::class . ':BorrarUno');
 
   $this->put('/', \registroApi::class . ':ModificarUno');
      
 })->add(\MWparaAutentificar::class . ':VerificarUsuario')->add(\MWparaCORS::class . ':HabilitarCORSTodos ');
 
 
 $app->group('/token', function () {
  
   $this->post('/', \AutentificadorJWT::class . ':CrearToken')->add(\MWparaCORS::class . ':HabilitarCORSTodos');  
 
      
 })->add(\MWparaCORS::class . ':HabilitarCORSTodos');



$app->run();