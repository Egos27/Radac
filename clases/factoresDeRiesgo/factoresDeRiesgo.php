<?php
class factoresDeRiesgo
{
	public $id;
 	public $registroId;
  	public $hipertensionArterial;
  	public $diabetes;
	public $tabaquismo;  
	public $antecedentesFamiliares;
	public $dislipemia;
	public $miocardiopatia;
	public $cardiopatiaCongenita;


  	public function BorrarfactoresDeRiesgo()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from factoresDeRiesgo
			 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarfactoresDeRiesgo()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update factoresDeRiesgo
			 
				set registroId='$this->registroId',
				hipertensionArterial='$this->hipertensionArterial',
				diabetes='$this->diabetes',
				tabaquismo='$this->tabaquismo',
				antecedentesFamiliares='$this->antecedentesFamiliares',
				dislipemia='$this->dislipemia',
				miocardiopatia='$this->miocardiopatia',				
				cardiopatiaCongenita='$this->cardiopatiaCongenita'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarfactoresDeRiesgo()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into factoresDeRiesgo
			(registroId,hipertensionArterial,diabetes,tabaquismo,antecedentesFamiliares,dislipemia,miocardiopatia,cardiopatiaCongenita) 
				values('$this->registroId', '$this->hipertensionArterial', '$this->diabetes', '$this->tabaquismo', '$this->antecedentesFamiliares', '$this->dislipemia', '$this->miocardiopatia', '$this->cardiopatiaCongenita')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarfactoresDeRiesgo()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarfactoresDeRiesgo
				();
				 
	 		}else {
	 			$this->InsertarfactoresDeRiesgo
				();
	 		}

	 }


  	public static function TraerTodoLosfactoresDeRiesgo()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from factoresDeRiesgo");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "factoresDeRiesgo");		
	}

	public static function TraerUnfactorDeRiesgo($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from factoresDeRiesgo where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('factoresDeRiesgo');
			return $buscado;				

	}

}