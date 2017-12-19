<?php
require_once 'factoresDeRiesgo.php';
require_once 'clases/IApiUsable.php';

class factoresDeRiesgoApi extends factoresDeRiesgo implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=factoresDeRiesgo::TraerUnfactorDeRiesgo($id);
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
      	$todosDatoGen=factoresDeRiesgo::TraerTodoLosfactoresDeRiesgo();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $hipertensionArterial= $ArrayDeParametros['hipertensionArterial'];
  	    $diabetes= $ArrayDeParametros['diabetes'];
	    $tabaquismo = $ArrayDeParametros['tabaquismo'];
	    $antecedentesFamiliares= $ArrayDeParametros['antecedentesFamiliares'];
	    $dislipemia= $ArrayDeParametros['dislipemia'];
	    $miocardiopatia= $ArrayDeParametros['miocardiopatia'];
	    $cardiopatiaCongenita= $ArrayDeParametros['cardiopatiaCongenita'];

        $datosGen = new factoresDeRiesgo();
        $datosGen->registroId = $registroId;
		$datosGen->hipertensionArterial = $hipertensionArterial;
		$datosGen->diabetes = $diabetes;
		$datosGen->tabaquismo = $tabaquismo;
		$datosGen->antecedentesFamiliares = $antecedentesFamiliares;
		$datosGen->dislipemia = $dislipemia;
		$datosGen->miocardiopatia = $miocardiopatia;
		$datosGen->cardiopatiaCongenita = $cardiopatiaCongenita;
		
		$datosGen->InsertarfactoresDeRiesgo();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new factoresDeRiesgo();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarfactoresDeRiesgo();

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
	    
	    $datosGen = new factoresDeRiesgo();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->hipertensionArterial = $ArrayDeParametros['hipertensionArterial'];
		$datosGen->diabetes = $ArrayDeParametros['diabetes'];
		$datosGen->tabaquismo = $ArrayDeParametros['tabaquismo'];
		$datosGen->antecedentesFamiliares = $ArrayDeParametros['antecedentesFamiliares'];
		$datosGen->dislipemia = $ArrayDeParametros['dislipemia'];
		$datosGen->miocardiopatia = $ArrayDeParametros['miocardiopatia'];
		$datosGen->cardiopatiaCongenita = $ArrayDeParametros['cardiopatiaCongenita'];

	   	$resultado =$datosGen->GuardarfactoresDeRiesgo();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}