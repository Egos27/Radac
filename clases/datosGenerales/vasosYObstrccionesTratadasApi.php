<?php
require_once 'VasosYObstruccionesTratadas.php';
require_once 'clases/IApiUsable.php';

class VasosYObstruccionesTratadasApi extends VasosYObstruccionesTratadas implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=VasosYObstruccionesTratadas::TraerUnVasosYObstruccionesTratadas($id);
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
      	$todosDatoGen=VasosYObstruccionesTratadas::TraerTodoLosVasosYObstruccionesTratadas();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $caracteristicasDeLa1erObstruccion= $ArrayDeParametros['caracteristicasDeLa1erObstruccion'];
  	    $caracteristicasDeLa2daObstruccion= $ArrayDeParametros[''];
	    $caracteristicasDeLa3erObstruccion = $ArrayDeParametros['caracteristicasDeLa3erObstruccion'];
	    $caracteristicasDeLa4taObstruccion= $ArrayDeParametros['caracteristicasDeLa4taObstruccion'];
	    $stentsColocados= $ArrayDeParametros['stentsColocados'];
	    $complicacionesYOEventosDelProcedimiento= $ArrayDeParametros['complicacionesYOEventosDelProcedimiento'];
		


        $datosGen = new VasosYObstruccionesTratadas();
        $datosGen->registroId = $registroId;
		$datosGen->caracteristicasDeLa1erObstruccion = $caracteristicasDeLa1erObstruccion;
		$datosGen-> = $;
		$datosGen->caracteristicasDeLa3erObstruccion = $caracteristicasDeLa3erObstruccion;
		$datosGen->caracteristicasDeLa4taObstruccion = $caracteristicasDeLa4taObstruccion;
		$datosGen->stentsColocados = $stentsColocados;
		$datosGen->complicacionesYOEventosDelProcedimiento = $complicacionesYOEventosDelProcedimiento;
		
		
		$datosGen->InsertarVasosYObstruccionesTratadas();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new VasosYObstruccionesTratadas();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarVasosYObstruccionesTratadas();

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
	    
	    $datosGen = new VasosYObstruccionesTratadas();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->caracteristicasDeLa1erObstruccion = $ArrayDeParametros['caracteristicasDeLa1erObstruccion'];
		$datosGen-> = $ArrayDeParametros[''];
		$datosGen->caracteristicasDeLa3erObstruccion = $ArrayDeParametros['caracteristicasDeLa3erObstruccion'];
		$datosGen->caracteristicasDeLa4taObstruccion = $ArrayDeParametros['caracteristicasDeLa4taObstruccion'];
		$datosGen->stentsColocados = $ArrayDeParametros['stentsColocados'];
		$datosGen->complicacionesYOEventosDelProcedimiento = $ArrayDeParametros['complicacionesYOEventosDelProcedimiento'];
	

	   	$resultado =$datosGen->GuardarVasosYObstruccionesTratadas();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}