<?php
class Seguimiento6Meses	
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
	
	

  	public function BorrarSeguimiento6Meses	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from Seguimiento6Meses	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarSeguimiento6Meses	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update Seguimiento6Meses	 
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
	
  
	 public function InsertarSeguimiento6Meses	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into Seguimiento6Meses	(registroId,suspensionDeDobleAntiagregacion,iam,suspensionDeDobleAntiagregacionATC,angina,reATCVasoTratado,crm,acv,obito,
				trombosisDelStent) 
				values('$this->registroId', '$this->suspensionDeDobleAntiagregacion', '$this->iam', '$this->suspensionDeDobleAntiagregacionATC', '$this->angina', '$this->reATCVasoTratado', '$this->crm', '$this->acv'
				'$this->obito','$this->trombosisDelStent',)");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarSeguimiento6Meses	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarSeguimiento6Meses	();
				 
	 		}else {
	 			$this->InsertarSeguimiento6Meses	();
	 		}

	 }


  	public static function TraerTodoLosSeguimiento6Meses	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Seguimiento6Meses	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Seguimiento6Meses	");		
	}

	public static function TraerUnSeguimiento6Meses($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Seguimiento6Meses	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('Seguimiento6Meses');
			return $buscado;				

	}

}