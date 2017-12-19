<?php
class SegundoProcedimiento	
{
	public $id;
 	public $registroId;

	

  	public function BorrarSegundoProcedimiento	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from SegundoProcedimiento	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarSegundoProcedimiento	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update SegundoProcedimiento	 
				set registroId='$this->registroId',
				
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarSegundoProcedimiento	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into SegundoProcedimiento	(registroId) 
				values('$this->registroId')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarSegundoProcedimiento	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarSegundoProcedimiento	();
				 
	 		}else {
	 			$this->InsertarSegundoProcedimiento	();
	 		}

	 }


  	public static function TraerTodoLosSegundoProcedimiento	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from SegundoProcedimiento	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "SegundoProcedimiento	");		
	}

	public static function TraerUnSegundoProcedimiento($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from SegundoProcedimiento	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('SegundoProcedimiento');
			return $buscado;				

	}

}