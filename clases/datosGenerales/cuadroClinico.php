<?php
class CuadroClinico	
{
	public $id;
 	public $registroId;
  	public $ace;
  	public $isquemiaSilente;
	public $pruebaFuncional;
	public $insuficienciaCardiaca;
	public $arritmias;
	public $iam;
	public $anginaInestable;
	public $estrategiaUtilizada;
	public $tiempoSintomaBalon;
	public $tiempoPuertaBalon;
	public $killipKimball;
	public $paroCardioRespiratorioReanimado;
	public $shockCardiogenico;
	

  	public function BorrarCuadroClinico	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from CuadroClinico	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarCuadroClinico	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update CuadroClinico	 
				set registroId='$this->registroId',
				ace='$this->ace',
				isquemiaSilente='$this->isquemiaSilente,
				pruebaFuncional='$this->pruebaFuncional',
				insuficienciaCardiaca='$this->insuficienciaCardiaca',
				arritmias='$this->arritmias',				
				iam='$this->iam',
				anginaInestable='$this->anginaInestable',
				estrategiaUtilizada='$this->estrategiaUtilizada',
				tiempoSintomaBalon='$this->tiempoSintomaBalon',
				tiempoPuertaBalon='$this->tiempoPuertaBalon',
				killipKimball='$this->killipKimball',
				paroCardioRespiratorioReanimado='$this->paroCardioRespiratorioReanimado',
				shockCardiogenico='$this->shockCardiogenico',

				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarCuadroClinico	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into CuadroClinico	(registroId,ace,isquemiaSilente,pruebaFuncional,insuficienciaCardiaca,arritmias,iam,anginaInestable,
				estrategiaUtilizada,tiempoSintomaBalon,tiempoPuertaBalon,killipKimball,paroCardioRespiratorioReanimado,shockCardiogenico) 
				values('$this->registroId', '$this->ace', '$this->isquemiaSilente', '$this->pruebaFuncional', '$this->insuficienciaCardiaca', '$this->arritmias', '$this->iam'
				'$this->anginaInestable','$this->estrategiaUtilizada','$this->tiempoSintomaBalon','$this->tiempoPuertaBalon','$this->killipKimball','$this->paroCardioRespiratorioReanimado','$this->shockCardiogenico')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarCuadroClinico	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarCuadroClinico	();
				 
	 		}else {
	 			$this->InsertarCuadroClinico	();
	 		}

	 }


  	public static function TraerTodoLosCuadroClinico	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from CuadroClinico	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "CuadroClinico	");		
	}

	public static function TraerUnCuadroClinico($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from CuadroClinico	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('CuadroClinico');
			return $buscado;				

	}

}