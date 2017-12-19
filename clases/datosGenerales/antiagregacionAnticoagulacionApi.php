<?php
require_once 'AntiagregacionAnticoagulacion.php';
require_once 'clases/IApiUsable.php';

class AntiagregacionAnticoagulacionApi extends AntiagregacionAnticoagulacion implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=AntiagregacionAnticoagulacion::TraerUnAntiagregacionAnticoagulacion($id);
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
      	$todosDatoGen=AntiagregacionAnticoagulacion::TraerTodoLosAntiagregacionAnticoagulacion();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $antiagregacionAlAlta= $ArrayDeParametros['antiagregacionAlAlta'];
  	    $anticoagulacionAlAlta= $ArrayDeParametros['anticoagulacionAlAlta'];
	    $indicacionDeLaAnticoagulacion = $ArrayDeParametros['indicacionDeLaAnticoagulacion'];
	   



        $datosGen = new AntiagregacionAnticoagulacion();
        $datosGen->registroId = $registroId;
		$datosGen->antiagregacionAlAlta = $antiagregacionAlAlta;
		$datosGen->anticoagulacionAlAlta = $anticoagulacionAlAlta;
		$datosGen->indicacionDeLaAnticoagulacion = $indicacionDeLaAnticoagulacion;
		
	

		
		$datosGen->InsertarAntiagregacionAnticoagulacion();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new AntiagregacionAnticoagulacion();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarAntiagregacionAnticoagulacion();

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
	    
	    $datosGen = new AntiagregacionAnticoagulacion();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->antiagregacionAlAlta = $ArrayDeParametros['antiagregacionAlAlta'];
		$datosGen->anticoagulacionAlAlta = $ArrayDeParametros['anticoagulacionAlAlta'];
		$datosGen->indicacionDeLaAnticoagulacion = $ArrayDeParametros['indicacionDeLaAnticoagulacion'];
	


	   	$resultado =$datosGen->GuardarAntiagregacionAnticoagulacion();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}