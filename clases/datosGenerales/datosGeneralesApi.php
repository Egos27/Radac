<?php
require_once 'datosGenerales.php';
require_once 'clases/IApiUsable.php';

class datosGeneralesApi extends datosGenerales implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=datosGenerales::TraerUnDatosGeneral($id);
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
      	$todosDatoGen=datosGenerales::TraerTodoLosDatosGenerales();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $iniciales= $ArrayDeParametros['iniciales'];
  	    $edad= $ArrayDeParametros['edad'];
	    $fechaATC = $ArrayDeParametros['fechaATC'];
	    $sexo= $ArrayDeParametros['sexo'];
	    $peso= $ArrayDeParametros['peso'];
	    $talla= $ArrayDeParametros['talla'];
	    $atcId= $ArrayDeParametros['atcId'];

        $datosGen = new datosGenerales();
        $datosGen->registroId = $registroId;
		$datosGen->iniciales = $iniciales;
		$datosGen->edad = $edad;
		$datosGen->fechaATC = $fechaATC;
		$datosGen->sexo = $sexo;
		$datosGen->peso = $peso;
		$datosGen->talla = $talla;
		$datosGen->atcId = $atcId;
		
		$datosGen->InsertarDatosGenerales();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new datosGenerales();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarDatosGenerales();

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
	    
	    $datosGen = new datosGenerales();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->iniciales = $ArrayDeParametros['iniciales'];
		$datosGen->edad = $ArrayDeParametros['edad'];
		$datosGen->fechaATC = $ArrayDeParametros['fechaATC'];
		$datosGen->sexo = $ArrayDeParametros['sexo'];
		$datosGen->peso = $ArrayDeParametros['peso'];
		$datosGen->talla = $ArrayDeParametros['talla'];
		$datosGen->atcId = $ArrayDeParametros['atcId'];

	   	$resultado =$datosGen->GuardarDatosGenerales();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}