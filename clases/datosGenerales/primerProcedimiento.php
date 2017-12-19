<?php
class PrimerProcedimiento	
{
	public $id;
 	public $registroId;
  	public $fecha;
  	public $viaDeAcceso;
	public $antiagregacionPlaquetaria;
	public $anticoagulacionParaElProcedimiento;
	public $tratamientoTrombolicoPrevio;
	public $inhibidoresIibIia;
	public $balonDeContrapropulsionIntraortico;
	public $tromboAspiracion;
	public $preparacionDePlaca;
	public $otrosMetodosDiagnosticosUtilizados;
	

  	public function BorrarPrimerProcedimiento	()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from PrimerProcedimiento	 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarPrimerProcedimiento	()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update PrimerProcedimiento	 
				set registroId='$this->registroId',
				fecha='$this->fecha',
				viaDeAcceso='$this->viaDeAcceso',
				fechaATC='$this->fechaATC',
				antiagregacionPlaquetaria='$this->antiagregacionPlaquetaria',
				anticoagulacionParaElProcedimiento='$this->anticoagulacionParaElProcedimiento',
				tratamientoTrombolicoPrevio='$this->tratamientoTrombolicoPrevio',				
				inhibidoresIibIia='$this->inhibidoresIibIia',
				balonDeContrapropulsionIntraortico='$this->balonDeContrapropulsionIntraortico',
				tromboAspiracion='$this->tromboAspiracion',
				preparacionDePlaca='$this->preparacionDePlaca',
				otrosMetodosDiagnosticosUtilizados='$this->otrosMetodosDiagnosticosUtilizados',
				
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarPrimerProcedimiento	()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("insert into PrimerProcedimiento	(registroId,fecha,viaDeAcceso,fechaATC,antiagregacionPlaquetaria,anticoagulacionParaElProcedimiento,tratamientoTrombolicoPrevio,inhibidoresIibIia,balonDeContrapropulsionIntraortico,
				tromboAspiracion,preparacionDePlaca,otrosMetodosDiagnosticosUtilizados) 
				values('$this->registroId', '$this->fecha', '$this->viaDeAcceso', '$this->fechaATC', '$this->antiagregacionPlaquetaria', '$this->anticoagulacionParaElProcedimiento', '$this->tratamientoTrombolicoPrevio', '$this->inhibidoresIibIia'
				'$this->balonDeContrapropulsionIntraortico','$this->tromboAspiracion','$this->preparacionDePlaca','$this->otrosMetodosDiagnosticosUtilizados')");				
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}

	  
	 public function GuardarPrimerProcedimiento	()
	 {
		var_dump($this->id);
	 	if($this->id>0)
	 		{
	 			$this->ModificarPrimerProcedimiento	();
				 
	 		}else {
	 			$this->InsertarPrimerProcedimiento	();
	 		}

	 }


  	public static function TraerTodoLosPrimerProcedimiento	()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from PrimerProcedimiento	");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "PrimerProcedimiento	");		
	}

	public static function TraerUnPrimerProcedimiento($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from PrimerProcedimiento	 where id = $id");
			$consulta->execute();
			$buscado= $consulta->fetchObject('PrimerProcedimiento');
			return $buscado;				

	}

}