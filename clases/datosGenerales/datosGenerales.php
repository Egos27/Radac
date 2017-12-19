<?php
class datosGenerales
{
	public $id;
 	public $registroId;
  	public $iniciales;
  	public $edad;
	public $fechaATC;  
	public $sexo;
	public $peso;
	public $talla;
	public $atcId;


  	public function BorrarDatosGenerales()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from DatosGenerales 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarDatosGenerales()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update DatosGenerales 
				set registroId='$this->registroId',
				iniciales='$this->iniciales',
				edad='$this->edad',
				fechaATC='$this->fechaATC',
				sexo='$this->sexo',
				peso='$this->peso',
				talla='$this->talla',				
				atcId='$this->atcId'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarDatosGenerales()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into DatosGenerales(registroId,iniciales,edad,fechaATC,sexo,peso,talla,atcId) 
				values('$this->registroId', '$this->iniciales', '$this->edad', '$this->fechaATC', '$this->sexo', '$this->peso', '$this->talla', '$this->atcId')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarDatosGenerales()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarDatosGenerales();
				 
	 		}else {
	 			$this->InsertarDatosGenerales();
	 		}

	 }


  	public static function TraerTodoLosDatosGenerales()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from DatosGenerales");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "datosGenerales");		
	}

	public static function TraerUnDatosGeneral($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from DatosGenerales where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('datosGenerales');
			return $buscado;				

	}

}