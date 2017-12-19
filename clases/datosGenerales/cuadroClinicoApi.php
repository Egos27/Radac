<?php
require_once 'CuadroClinico.php';
require_once 'clases/IApiUsable.php';

class CuadroClinicoApi extends CuadroClinico implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $datoGen=CuadroClinico::TraerUnCuadroClinico($id);
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
      	$todosDatoGen=CuadroClinico::TraerTodoLosCuadroClinico();
     	$newresponse = $response->withJson($todosDatoGen, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        
	    $registroId= $ArrayDeParametros['registroId'];
  	    $iniciales= $ArrayDeParametros['iniciales'];
  	    $ace= $ArrayDeParametros['ace'];
	    $isquemiaSilente = $ArrayDeParametros['isquemiaSilente'];
	    $pruebaFuncional= $ArrayDeParametros['pruebaFuncional'];
	    $insuficienciaCardiaca= $ArrayDeParametros['insuficienciaCardiaca'];
	    $arritmias= $ArrayDeParametros['arritmias'];
		$iam= $ArrayDeParametros['iam'];
		$anginaInestable= $ArrayDeParametros['anginaInestable'];
		$estrategiaUtilizada= $ArrayDeParametros['estrategiaUtilizada'];
		$tiempoSintomaBalon= $ArrayDeParametros['tiempoSintomaBalon'];
		$tiempoPuertaBalon= $ArrayDeParametros['tiempoPuertaBalon'];
		$killipKimball= $ArrayDeParametros['killipKimball'];
		$paroCardioRespiratorioReanimado= $ArrayDeParametros['paroCardioRespiratorioReanimado'];
		$shockCardioCongenico= $ArrayDeParametros['shockCardioCongenico'];
	



        $datosGen = new CuadroClinico();
        $datosGen->registroId = $registroId;
		$datosGen->iniciales = $iniciales;
		$datosGen->ace = $ace;
		$datosGen->isquemiaSilente = $isquemiaSilente;
		$datosGen->pruebaFuncional = $pruebaFuncional;
		$datosGen->insuficienciaCardiaca = $insuficienciaCardiaca;
		$datosGen->arritmias = $arritmias;
		$datosGen->iam = $iam;
		$datosGen->anginaInestable = $anginaInestable;
		$datosGen->estrategiaUtilizada = $estrategiaUtilizada;
		$datosGen->tiempoSintomaBalon = $tiempoSintomaBalon;
		$datosGen->tiempoPuertaBalon = $tiempoPuertaBalon;
		$datosGen->killipKimball = $killipKimball;
		$datosGen->paroCardioRespiratorioReanimado = $paroCardioRespiratorioReanimado;
		$datosGen->shockCardioCongenico = $shockCardioCongenico;
		
		
		$datosGen->InsertarCuadroClinico();
        $objDelaRespuesta->respuesta="Se guardo correctamente.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$datosGen= new CuadroClinico();
     	$datosGen->id=$id;
     	$cantidadDeBorrados=$datosGen->BorrarCuadroClinico();

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
	    
	    $datosGen = new CuadroClinico();
        $datosGen->id = $ArrayDeParametros['id'];
		$datosGen->registroId = $ArrayDeParametros['registroId'];
		$datosGen->iniciales = $ArrayDeParametros['iniciales'];
		$datosGen->ace = $ArrayDeParametros['ace'];
		$datosGen->isquemiaSilente = $ArrayDeParametros['isquemiaSilente'];
		$datosGen->pruebaFuncional = $ArrayDeParametros['pruebaFuncional'];
		$datosGen->insuficienciaCardiaca = $ArrayDeParametros['insuficienciaCardiaca'];
		$datosGen->arritmias = $ArrayDeParametros['arritmias'];
		$datosGen->iam = $ArrayDeParametros['iam'];
		$datosGen->anginaInestable = $ArrayDeParametros['anginaInestable'];
		$datosGen->estrategiaUtilizada = $ArrayDeParametros['estrategiaUtilizada'];
		$datosGen->tiempoSintomaBalon = $ArrayDeParametros['tiempoSintomaBalon'];
		$datosGen->tiempoPuertaBalon = $ArrayDeParametros['tiempoPuertaBalon'];
		$datosGen->killipKimball = $ArrayDeParametros['killipKimball'];
		$datosGen->paroCardioRespiratorioReanimado = $ArrayDeParametros['paroCardioRespiratorioReanimado'];
		$datosGen->shockCardioCongenico = $ArrayDeParametros['shockCardioCongenico'];
	

	   	$resultado =$datosGen->GuardarCuadroClinico();
	   	$objDelaRespuesta= new stdclass();
		
		$objDelaRespuesta->resultado=$resultado;
        $objDelaRespuesta->tarea="modificar";
		return $response->withJson($objDelaRespuesta, 200);		
    }


}