<?php
class Registro
{
	public $id;
 	public $registroId;
  	public $centro;
  	public $iniciales;
	public $fechaATM;
	public $fechaCreacion;
	public $usuarioId;	
	public $json;	

  	public function borrarRegistro()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from Registro
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarRegistro()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update Registro 
				set registroId='$this->registroId'
				 ,centro='$this->centro'
				 ,iniciales='$this->iniciales'
			   ,fechaATM='$this->fechaATM'
			   ,fechaCreacion='$this->fechaCreacion'
			,json='$this->json'	
			   WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarRegistro()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into Registro(registroId, centro, iniciales, fechaATM, fechaCreacion, usuarioId, json) 
				values('$this->registroId', '$this->centro', '$this->iniciales', '$this->fechaATM', '$this->fechaCreacion', '$this->json')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarRegistro()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarRegistro();
				 
	 		}else {
	 			$this->InsertarRegistro();
	 		}

	 }


  	public static function TraerTodoLosRegistros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Registro");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Registro");		
	}

	public static function TraerUnRegistro($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Registro where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('registro');
			return $buscado;				

	}

}