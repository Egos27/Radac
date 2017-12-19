<?php
class Antecedentes	
{
	public $id;
 	public $registroId;
  	public $iamPrevio;
  	public $crmPrevia;
	public $atcPrevia;  
	public $icc;
	public $acv;
	public $insuficienciaRenal;
	public $enfermedadVascularPeriferica;
	public $aneurismaDeAortaAbdominal;
	public $enfermedadCarotidea;
	public $menopausiaPrecoz;
	public $hipotiroidismo;
	public $epoc;
	public $valvulopatia;
	public $miocardiopatia;
	public $cardiopatiaCongenita;
	

  	public function BorrarAntecedentes	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from Antecedentes	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarAntecedentes	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update Antecedentes	 
				set registroId='$this->registroId',
				iamPrevio='$this->iamPrevio',
				crmPrevia='$this->crmPrevia',
				atcPrevia='$this->atcPrevia',
				fechaATC='$this->fechaATC',
				icc='$this->icc',
				acv='$this->acv',
				insuficienciaRenal='$this->insuficienciaRenal',				
				enfermedadVascularPeriferica='$this->enfermedadVascularPeriferica',
				aneurismaDeAortaAbdominal='$this->aneurismaDeAortaAbdominal',
				enfermedadCarotidea='$this->enfermedadCarotidea',
				menopausiaPrecoz='$this->menopausiaPrecoz',
				hipotiroidismo='$this->hipotiroidismo',
				epoc='$this->epoc',
				valvulopatia='$this->valvulopatia',
				miocardiopatia='$this->miocardiopatia',
				cardiopatiaCongenita='$this->cardiopatiaCongenita'

				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarAntecedentes	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into Antecedentes	(registroId,iamPrevio,crmPrevia,atcPrevia,fechaATC,icc,acv,insuficienciaRenal,enfermedadVascularPeriferica,aneurismaDeAortaAbdominal,
				enfermedadCarotidea,menopausiaPrecoz,hipotiroidismo,epoc,valvulopatia,miocardiopatia,cardiopatiaCongenita) 
				values('$this->registroId', '$this->iamPrevio', '$this->crmPrevia', '$this->atcPrevia', '$this->fechaATC', '$this->icc', '$this->acv', '$this->insuficienciaRenal', '$this->enfermedadVascularPeriferica'
				'$this->aneurismaDeAortaAbdominal','$this->enfermedadCarotidea','$this->menopausiaPrecoz','$this->hipotiroidismo','$this->epoc','$this->valvulopatia','$this->miocardiopatia','$this->cardiopatiaCongenita')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarAntecedentes	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarAntecedentes	();
				 
	 		}else {
	 			$this->InsertarAntecedentes	();
	 		}

	 }


  	public static function TraerTodoLosAntecedentes	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Antecedentes	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Antecedentes	");		
	}

	public static function TraerUnAntecedentes($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Antecedentes	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('Antecedentes');
			return $buscado;				

	}

}