<?php
require_once 'EventosIntraHospitalarios.php';
require_once 'clases/IApiUsable.php';

class EventosIntraHospitalariosApi extends EventosIntraHospitalarios implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=EventosIntraHospitalarios::TraerUnEventosIntraHospitalarios($id);
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
      	$todosDatoGen=EventosIntraHospitalarios::TraerTodoLosEventosIntraHospitalarios();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $iamPeriProcedimiento= $ArrayDeParametros['iamPeriProcedimiento'];
  	    $reInfarto= $ArrayDeParametros['reInfarto'];
	    $iamEspontaneo = $ArrayDeParametros['iamEspontaneo'];
	    $muerteSubita= $ArrayDeParametros['muerteSubita'];
	    $revascularizacionDelVasoTratado= $ArrayDeParametros['revascularizacionDelVasoTratado'];
	    $sangrado= $ArrayDeParametros['sangrado'];
		$acv= $ArrayDeParametros['acv'];
		$insuficienciaRenal= $ArrayDeParametros['insuficienciaRenal'];
		$obito= $ArrayDeParametros['obito'];
		$trombosisDelStent= $ArrayDeParametros['trombosisDelStent'];
	



        $datosGen = new EventosIntraHospitalarios();
        $datosGen->registroId = $registroId;
		$datosGen->iamPeriProcedimiento = $iamPeriProcedimiento;
		$datosGen->reInfarto = $reInfarto;
		$datosGen->iamEspontaneo = $iamEspontaneo;
		$datosGen->muerteSubita = $muerteSubita;
		$datosGen->revascularizacionDelVasoTratado = $revascularizacionDelVasoTratado;
		$datosGen->sangrado = $sangrado;
		$datosGen->acv = $acv;
		$datosGen->insuficienciaRenal = $insuficienciaRenal;
		$datosGen->obito = $obito;
		$datosGen->trombosisDelStent = $trombosisDelStent;
		

		
		$datosGen->InsertarEventosIntraHospitalarios();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new EventosIntraHospitalarios();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarEventosIntraHospitalarios();

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
	    
	    $datosGen = new EventosIntraHospitalarios();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->iamPeriProcedimiento = $ArrayDeParametros['iamPeriProcedimiento'];
		$datosGen->reInfarto = $ArrayDeParametros['reInfarto'];
		$datosGen->iamEspontaneo = $ArrayDeParametros['iamEspontaneo'];
		$datosGen->muerteSubita = $ArrayDeParametros['muerteSubita'];
		$datosGen->revascularizacionDelVasoTratado = $ArrayDeParametros['revascularizacionDelVasoTratado'];
		$datosGen->sangrado = $ArrayDeParametros['sangrado'];
		$datosGen->acv = $ArrayDeParametros['acv'];
		$datosGen->insuficienciaRenal = $ArrayDeParametros['insuficienciaRenal'];
		$datosGen->obito = $ArrayDeParametros['obito'];
		$datosGen->trombosisDelStent = $ArrayDeParametros['trombosisDelStent'];
	


	   	$resultado =$datosGen->GuardarEventosIntraHospitalarios();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}