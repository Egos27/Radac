<?php
class Coronariografia	
{
	public $id;
 	public $registroId;
  	public $dominancia;
  	public $cantidadDeVasosConObstruccionSevera;
	public $cantidadDeVasosATratar;
	public $syntaxScore;
	

  	public function BorrarCoronariografia	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from Coronariografia	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarCoronariografia	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update Coronariografia	 
				set registroId='$this->registroId',
				dominancia='$this->dominancia',
				cantidadDeVasosConObstruccionSevera='$this->cantidadDeVasosConObstruccionSevera',
				fechaATC='$this->fechaATC',
				cantidadDeVasosATratar='$this->cantidadDeVasosATratar',
				syntaxScore='$this->syntaxScore',
		
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarCoronariografia	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into Coronariografia	(registroId,dominancia,cantidadDeVasosConObstruccionSevera,fechaATC,cantidadDeVasosATratar,syntaxScore) 
				values('$this->registroId', '$this->dominancia', '$this->cantidadDeVasosConObstruccionSevera', '$this->fechaATC', '$this->cantidadDeVasosATratar', '$this->syntaxScore'");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarCoronariografia	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarCoronariografia	();
				 
	 		}else {
	 			$this->InsertarCoronariografia	();
	 		}

	 }


  	public static function TraerTodoLosCoronariografia	()
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