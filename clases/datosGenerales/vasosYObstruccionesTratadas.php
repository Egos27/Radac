<?php
class VasosYObstruccionesTratadas	
{
	public $id;
 	public $registroId;
  	public $caracteristicasDeLa1erObstruccion;
  	public $caracteristicasDeLa2daObstruccion;
	public $caracteristicasDeLa3erObstruccion;
	public $caracteristicasDeLa4taObstruccion;
	public $stentsColocados;
	public $complicacionesYOEventosDelProcedimiento;

	

  	public function BorrarVasosYObstruccionesTratadas	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from VasosYObstruccionesTratadas	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarVasosYObstruccionesTratadas	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update VasosYObstruccionesTratadas	 
				set registroId='$this->registroId',
				er='$this->er',
				caracteristicasDeLa2daObstruccion='$this->caracteristicasDeLa2daObstruccion',
				erATC='$this->erATC',
				caracteristicasDeLa3erObstruccion='$this->caracteristicasDeLa3erObstruccion',
				caracteristicasDeLa4taObstruccion='$this->caracteristicasDeLa4taObstruccion',
				stentsColocados='$this->stentsColocados',				
				complicacionesYOEventosDelProcedimiento='$this->complicacionesYOEventosDelProcedimiento',
				
				
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarVasosYObstruccionesTratadas	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into VasosYObstruccionesTratadas	(registroId,er,caracteristicasDeLa2daObstruccion,erATC,caracteristicasDeLa3erObstruccion,caracteristicasDeLa4taObstruccion,stentsColocados,complicacionesYOEventosDelProcedimiento) 
				values('$this->registroId', '$this->er', '$this->caracteristicasDeLa2daObstruccion', '$this->erATC', '$this->caracteristicasDeLa3erObstruccion', '$this->caracteristicasDeLa4taObstruccion', '$this->stentsColocados', '$this->complicacionesYOEventosDelProcedimiento')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarVasosYObstruccionesTratadas	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarVasosYObstruccionesTratadas	();
				 
	 		}else {
	 			$this->InsertarVasosYObstruccionesTratadas	();
	 		}

	 }


  	public static function TraerTodoLosVasosYObstruccionesTratadas	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from VasosYObstruccionesTratadas	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "VasosYObstruccionesTratadas	");		
	}

	public static function TraerUnVasosYObstruccionesTratadas($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from VasosYObstruccionesTratadas	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('VasosYObstruccionesTratadas');
			return $buscado;				

	}

}