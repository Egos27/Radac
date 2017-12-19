<?php
class Alta	
{
	public $id;
 	public $registroId;
  	public $fecha;
  	public $diasDeInternacion;
	

  	public function BorrarAlta	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from Alta	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarAlta	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update Alta	 
				set registroId='$this->registroId',
				fecha='$this->fecha',
				diasDeInternacion='$this->diasDeInternacion',
				
		
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarAlta	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into Alta	(registroId,fecha,diasDeInternacion) 
				values('$this->registroId', '$this->fecha', '$this->diasDeInternacion'->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarAlta	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarAlta	();
				 
	 		}else {
	 			$this->InsertarAlta	();
	 		}

	 }


  	public static function TraerTodoLosAlta	()
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