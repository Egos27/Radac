<?php
require_once 'Seguimiento6Meses.php';
require_once 'clases/IApiUsable.php';

class Seguimiento6MesesApi extends Seguimiento6Meses implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=Seguimiento6Meses::TraerUnSeguimiento6Meses($id);
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
      	$todosDatoGen=Seguimiento6Meses::TraerTodoLosSeguimiento6Meses();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $suspensionDeDobleAntiagregacion= $ArrayDeParametros['suspensionDeDobleAntiagregacion'];
  	    $iam= $ArrayDeParametros['iam'];
	    $angina = $ArrayDeParametros['angina'];
	    $reATCVasoTratado= $ArrayDeParametros['reATCVasoTratado'];
	    $crm= $ArrayDeParametros['crm'];
	    $acv= $ArrayDeParametros['acv'];
		$obito= $ArrayDeParametros['obito'];
		$trombosisDelStent= $ArrayDeParametros['trombosisDelStent'];
		



        $datosGen = new Seguimiento6Meses();
        $datosGen->registroId = $registroId;
		$datosGen->suspensionDeDobleAntiagregacion = $suspensionDeDobleAntiagregacion;
		$datosGen->iam = $iam;
		$datosGen->angina = $angina;
		$datosGen->reATCVasoTratado = $reATCVasoTratado;
		$datosGen->crm = $crm;
		$datosGen->acv = $acv;
		$datosGen->obito = $obito;
		$datosGen->trombosisDelStent = $trombosisDelStent;
		

		
		$datosGen->InsertarSeguimiento6Meses();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new Seguimiento6Meses();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarSeguimiento6Meses();

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
	    
	    $datosGen = new Seguimiento6Meses();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->suspensionDeDobleAntiagregacion = $ArrayDeParametros['suspensionDeDobleAntiagregacion'];
		$datosGen->iam = $ArrayDeParametros['iam'];
		$datosGen->angina = $ArrayDeParametros['angina'];
		$datosGen->reATCVasoTratado = $ArrayDeParametros['reATCVasoTratado'];
		$datosGen->crm = $ArrayDeParametros['crm'];
		$datosGen->acv = $ArrayDeParametros['acv'];
		$datosGen->obito = $ArrayDeParametros['obito'];
		$datosGen->trombosisDelStent = $ArrayDeParametros['trombosisDelStent'];
	


	   	$resultado =$datosGen->GuardarSeguimiento6Meses();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}