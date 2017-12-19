<?php
class EventosIntraHospitalarios	
{
	public $id;
 	public $registroId;
  	public $iamPeriProcedimiento;
  	public $reInfarto;
	public $iamEspontaneo;
	public $muerteSubita;
	public $revascularizacionDelVasoTratado;
	public $sangrado;
	public $acv;
	public $insuficienciaRenal;
	public $obito;
	public $trombosisDelStent;
	

  	public function BorrarEventosIntraHospitalarios	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from EventosIntraHospitalarios	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarEventosIntraHospitalarios	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update EventosIntraHospitalarios	 
				set registroId='$this->registroId',
				iamPeriProcedimiento='$this->iamPeriProcedimiento',
				reInfarto='$this->reInfarto',
				iamPeriProcedimientoATC='$this->iamPeriProcedimientoATC',
				iamEspontaneo='$this->iamEspontaneo',
				muerteSubita='$this->muerteSubita',
				revascularizacionDelVasoTratado='$this->revascularizacionDelVasoTratado',				
				sangrado='$this->sangrado',
				acv='$this->acv',
				insuficienciaRenal='$this->insuficienciaRenal',
				obito='$this->obito',
				trombosisDelStent='$this->trombosisDelStent',
				
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarEventosIntraHospitalarios	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into EventosIntraHospitalarios	(registroId,iamPeriProcedimiento,reInfarto,iamPeriProcedimientoATC,iamEspontaneo,muerteSubita,revascularizacionDelVasoTratado,sangrado,acv,
				insuficienciaRenal,obito,trombosisDelStent) 
				values('$this->registroId', '$this->iamPeriProcedimiento', '$this->reInfarto', '$this->iamPeriProcedimientoATC', '$this->iamEspontaneo', '$this->muerteSubita', '$this->revascularizacionDelVasoTratado', '$this->sangrado'
				'$this->acv','$this->insuficienciaRenal','$this->obito','$this->trombosisDelStent')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarEventosIntraHospitalarios	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarEventosIntraHospitalarios	();
				 
	 		}else {
	 			$this->InsertarEventosIntraHospitalarios	();
	 		}

	 }


  	public static function TraerTodoLosEventosIntraHospitalarios	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from EventosIntraHospitalarios	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "EventosIntraHospitalarios	");		
	}

	public static function TraerUnEventosIntraHospitalarios($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from EventosIntraHospitalarios	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('EventosIntraHospitalarios');
			return $buscado;				

	}

}