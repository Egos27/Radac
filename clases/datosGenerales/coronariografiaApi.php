<?php
require_once 'Coronariografia.php';
require_once 'clases/IApiUsable.php';

class CoronariografiaApi extends Coronariografia implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=Coronariografia::TraerUnCoronariografia($id);
        if(!$datoGen)
        {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="No hay datos";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
        }else
        {
            $NuevaRespuesta = $response->withJson($datoGen, 200); 
        }     
        return $NuevaRespuesta;
    }
     public function TraerTodos($request, $response, $args) {
      	$todosDatoGen=Coronariografia::TraerTodoLosCoronariografia();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $dominancia= $ArrayDeParametros['dominancia'];
  	    $cantidadDeVasosConObstruccionSevera= $ArrayDeParametros['cantidadDeVasosConObstruccionSevera'];
	    $cantidadDeVasosATratar = $ArrayDeParametros['cantidadDeVasosATratar'];
	    $syntaxScore= $ArrayDeParametros['syntaxScore'];
	   



        $datosGen = new Coronariografia();
        $datosGen->registroId = $registroId;
		$datosGen->dominancia = $dominancia;
		$datosGen->cantidadDeVasosConObstruccionSevera = $cantidadDeVasosConObstruccionSevera;
		$datosGen->cantidadDeVasosATratar = $cantidadDeVasosATratar;
		$datosGen->syntaxScore = $syntaxScore;
	

		
		$datosGen->InsertarCoronariografia();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new Coronariografia();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarCoronariografia();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {
     	
     	$ArrayDeParametros = $request->getParsedBody();
	    
	    $datosGen = new Coronariografia();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->dominancia = $ArrayDeParametros['dominancia'];
		$datosGen->cantidadDeVasosConObstruccionSevera = $ArrayDeParametros['cantidadDeVasosConObstruccionSevera'];
		$datosGen->cantidadDeVasosATratar = $ArrayDeParametros['cantidadDeVasosATratar'];
		$datosGen->syntaxScore = $ArrayDeParametros['syntaxScore'];
		


	   	$resultado =$datosGen->GuardarCoronariografia();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}