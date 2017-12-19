<?php
require_once 'PrimerProcedimiento.php';
require_once 'clases/IApiUsable.php';

class PrimerProcedimientoApi extends PrimerProcedimiento implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=PrimerProcedimiento::TraerUnPrimerProcedimiento($id);
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
      	$todosDatoGen=PrimerProcedimiento::TraerTodoLosPrimerProcedimiento();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $fecha= $ArrayDeParametros['fecha'];
  	    $viaDeAcceso= $ArrayDeParametros['viaDeAcceso'];
	    $antiagregacionPlaquetaria = $ArrayDeParametros['antiagregacionPlaquetaria'];
	    $anticoagulacionParaElProcedimiento= $ArrayDeParametros['anticoagulacionParaElProcedimiento'];
	    $tratamientoTromboliticoPrevio= $ArrayDeParametros['tratamientoTromboliticoPrevio'];
	    $inhibidoresIibIia= $ArrayDeParametros['inhibidoresIibIia'];
		$balonDeContrapropulsionIntraortico= $ArrayDeParametros['balonDeContrapropulsionIntraortico'];
		$tromboAspiracion= $ArrayDeParametros['tromboAspiracion'];
		$preparacionDePlaca= $ArrayDeParametros['preparacionDePlaca'];
		$otrosMetodosDiagnosticosUtilizados= $ArrayDeParametros['otrosMetodosDiagnosticosUtilizados'];
	



        $datosGen = new PrimerProcedimiento();
        $datosGen->registroId = $registroId;
		$datosGen->fecha = $fecha;
		$datosGen->viaDeAcceso = $viaDeAcceso;
		$datosGen->antiagregacionPlaquetaria = $antiagregacionPlaquetaria;
		$datosGen->anticoagulacionParaElProcedimiento = $anticoagulacionParaElProcedimiento;
		$datosGen->tratamientoTromboliticoPrevio = $tratamientoTromboliticoPrevio;
		$datosGen->inhibidoresIibIia = $inhibidoresIibIia;
		$datosGen->balonDeContrapropulsionIntraortico = $balonDeContrapropulsionIntraortico;
		$datosGen->tromboAspiracion = $tromboAspiracion;
		$datosGen->preparacionDePlaca = $preparacionDePlaca;
		$datosGen->otrosMetodosDiagnosticosUtilizados = $otrosMetodosDiagnosticosUtilizados;
		

		
		$datosGen->InsertarPrimerProcedimiento();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new PrimerProcedimiento();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarPrimerProcedimiento();

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
	    
	    $datosGen = new PrimerProcedimiento();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->fecha = $ArrayDeParametros['fecha'];
		$datosGen->viaDeAcceso = $ArrayDeParametros['viaDeAcceso'];
		$datosGen->antiagregacionPlaquetaria = $ArrayDeParametros['antiagregacionPlaquetaria'];
		$datosGen->anticoagulacionParaElProcedimiento = $ArrayDeParametros['anticoagulacionParaElProcedimiento'];
		$datosGen->tratamientoTromboliticoPrevio = $ArrayDeParametros['tratamientoTromboliticoPrevio'];
		$datosGen->inhibidoresIibIia = $ArrayDeParametros['inhibidoresIibIia'];
		$datosGen->balonDeContrapropulsionIntraortico = $ArrayDeParametros['balonDeContrapropulsionIntraortico'];
		$datosGen->tromboAspiracion = $ArrayDeParametros['tromboAspiracion'];
		$datosGen->preparacionDePlaca = $ArrayDeParametros['preparacionDePlaca'];
		$datosGen->otrosMetodosDiagnosticosUtilizados = $ArrayDeParametros['otrosMetodosDiagnosticosUtilizados'];
	


	   	$resultado =$datosGen->GuardarPrimerProcedimiento();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}