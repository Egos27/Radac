<?php
require_once 'Antecedentes.php';
require_once 'clases/IApiUsable.php';

class AntecedentesApi extends Antecedentes implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=Antecedentes::TraerUnAntecedentes($id);
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
      	$todosDatoGen=Antecedentes::TraerTodoLosAntecedentes();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $iniciales= $ArrayDeParametros['iniciales'];
  	    $iamPrevio= $ArrayDeParametros['iamPrevio'];
	    $crmPrevia = $ArrayDeParametros['crmPrevia'];
	    $atcPrevia= $ArrayDeParametros['atcPrevia'];
	    $icc= $ArrayDeParametros['icc'];
	    $acv= $ArrayDeParametros['acv'];
		$insuficienciaRenal= $ArrayDeParametros['insuficienciaRenal'];
		$enfermedadVascularPeriferica= $ArrayDeParametros['enfermedadVascularPeriferica'];
		$aneurismaDeAortaAbdominal= $ArrayDeParametros['aneurismaDeAortaAbdominal'];
		$enfermedadCarotidea= $ArrayDeParametros['enfermedadCarotidea'];
		$menopausiaPrecoz= $ArrayDeParametros['menopausiaPrecoz'];
		$hipotiroidismo= $ArrayDeParametros['hipotiroidismo'];
		$epoc= $ArrayDeParametros['epoc'];
		$valvulopatia= $ArrayDeParametros['valvulopatia'];
		$miocardiopatia= $ArrayDeParametros['miocardiopatia'];
		$cardiopatiaCongenita= $ArrayDeParametros['cardiopatiaCongenita'];



        $datosGen = new Antecedentes();
        $datosGen->registroId = $registroId;
		$datosGen->iniciales = $iniciales;
		$datosGen->iamPrevio = $iamPrevio;
		$datosGen->crmPrevia = $crmPrevia;
		$datosGen->atcPrevia = $atcPrevia;
		$datosGen->icc = $icc;
		$datosGen->acv = $acv;
		$datosGen->insuficienciaRenal = $insuficienciaRenal;
		$datosGen->enfermedadVascularPeriferica = $enfermedadVascularPeriferica;
		$datosGen->aneurismaDeAortaAbdominal = $aneurismaDeAortaAbdominal;
		$datosGen->enfermedadCarotidea = $enfermedadCarotidea;
		$datosGen->menopausiaPrecoz = $menopausiaPrecoz;
		$datosGen->hipotiroidismo = $hipotiroidismo;
		$datosGen->epoc = $epoc;
		$datosGen->valvulopatia = $valvulopatia;
		$datosGen->miocardiopatia = $miocardiopatia;
		$datosGen->cardiopatiaCongenita = $cardiopatiaCongenita;

		
		$datosGen->InsertarAntecedentes();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new Antecedentes();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarAntecedentes();

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
	    
	    $datosGen = new Antecedentes();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->iniciales = $ArrayDeParametros['iniciales'];
		$datosGen->iamPrevio = $ArrayDeParametros['iamPrevio'];
		$datosGen->crmPrevia = $ArrayDeParametros['crmPrevia'];
		$datosGen->atcPrevia = $ArrayDeParametros['atcPrevia'];
		$datosGen->icc = $ArrayDeParametros['icc'];
		$datosGen->acv = $ArrayDeParametros['acv'];
		$datosGen->insuficienciaRenal = $ArrayDeParametros['insuficienciaRenal'];
		$datosGen->enfermedadVascularPeriferica = $ArrayDeParametros['enfermedadVascularPeriferica'];
		$datosGen->aneurismaDeAortaAbdominal = $ArrayDeParametros['aneurismaDeAortaAbdominal'];
		$datosGen->enfermedadCarotidea = $ArrayDeParametros['enfermedadCarotidea'];
		$datosGen->menopausiaPrecoz = $ArrayDeParametros['menopausiaPrecoz'];
		$datosGen->hipotiroidismo = $ArrayDeParametros['hipotiroidismo'];
		$datosGen->epoc = $ArrayDeParametros['epoc'];
		$datosGen->valvulopatia = $ArrayDeParametros['valvulopatia'];
		$datosGen->miocardiopatia = $ArrayDeParametros['miocardiopatia'];
		$datosGen->cardiopatiaCongenita = $ArrayDeParametros['cardiopatiaCongenita'];


	   	$resultado =$datosGen->GuardarAntecedentes();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}