<?php
class AntiagregacionAnticoagulacion	
{
	public $id;
 	public $registroId;
  	public $antiagregacionAlAlta;
  	public $anticoagulacionAlAlta;
	public $indicacionDeLaAnticoagulacion;

	

  	public function BorrarAntiagregacionAnticoagulacion	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from AntiagregacionAnticoagulacion	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarAntiagregacionAnticoagulacion	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update AntiagregacionAnticoagulacion	 
				set registroId='$this->registroId',
				antiagregacionAlAlta='$this->antiagregacionAlAlta',
				anticoagulacionAlAlta='$this->anticoagulacionAlAlta',
				indicacionDeLaAnticoagulacion='$this->indicacionDeLaAnticoagulacion',
			
		
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarAntiagregacionAnticoagulacion	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into AntiagregacionAnticoagulacion	(registroId,antiagregacionAlAlta,anticoagulacionAlAlta,indicacionDeLaAnticoagulacion) 
				values('$this->registroId', '$this->antiagregacionAlAlta', '$this->anticoagulacionAlAlta','$this->indicacionDeLaAnticoagulacion'");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarAntiagregacionAnticoagulacion	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarAntiagregacionAnticoagulacion	();
				 
	 		}else {
	 			$this->InsertarAntiagregacionAnticoagulacion	();
	 		}

	 }


  	public static function TraerTodoLosAntiagregacionAnticoagulacion	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from antecedentes	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "antecedentes	");		
	}

	public static function TraerUnAntecedentes($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from antecedentes	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('antecedentes');
			return $buscado;				

	}

}