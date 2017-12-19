<?php
class Seguimiento1Año	
{
	public $id;
 	public $registroId;
  	public $suspensionDeDobleAntiagregacion;
  	public $iam;
	public $angina;
	public $reATCVasoTratado;
	public $crm;
	public $acv;
	public $obito;
	public $trombosisDelStent;
	
	

  	public function BorrarSeguimiento1Año	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from Seguimiento1Año	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarSeguimiento1Año	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update Seguimiento1Año	 
				set registroId='$this->registroId',
				suspensionDeDobleAntiagregacion='$this->suspensionDeDobleAntiagregacion',
				iam='$this->iam',
				suspensionDeDobleAntiagregacionATC='$this->suspensionDeDobleAntiagregacionATC',
				angina='$this->angina',
				reATCVasoTratado='$this->reATCVasoTratado',
				crm='$this->crm',				
				acv='$this->acv',
				obito='$this->obito',
				trombosisDelStent='$this->trombosisDelStent',
		
				
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarSeguimiento1Año	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into Seguimiento1Año	(registroId,suspensionDeDobleAntiagregacion,iam,suspensionDeDobleAntiagregacionATC,angina,reATCVasoTratado,crm,acv,obito,
				trombosisDelStent) 
				values('$this->registroId', '$this->suspensionDeDobleAntiagregacion', '$this->iam', '$this->suspensionDeDobleAntiagregacionATC', '$this->angina', '$this->reATCVasoTratado', '$this->crm', '$this->acv'
				'$this->obito','$this->trombosisDelStent',)");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarSeguimiento1Año	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarSeguimiento1Año	();
				 
	 		}else {
	 			$this->InsertarSeguimiento1Año	();
	 		}

	 }


  	public static function TraerTodoLosSeguimiento1Año	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Seguimiento1Año	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Seguimiento1Año	");		
	}

	public static function TraerUnSeguimiento1Año($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Seguimiento1Año	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('Seguimiento1Año');
			return $buscado;				

	}

}