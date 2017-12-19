<?php
class usuario
{
	public $id;
 	public $nombre;
  	public $password;
  	public $habilitado;
	public $usuario;
	public $centro;
	public $fechaAlta;
	public $fechaUltimoAcceso;
	public $rol;


  	public function BorrarUsuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set habilitado = 0		
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	
	public function ModificarUsuario()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set nombre='$this->nombre',
				password='$this->password',
				usuario='$this->usuario',
				centro='$this->centro',
				fechaModificacion=NOW(),
				habilitado=1,
				rol='$this->rol'
				WHERE id='$this->id'");
			return $consulta->execute();
	 }
	
  
	 public function InsertarUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario  (nombre,password,usuario,centro,habilitado,fechaAlta,rol)values('$this->nombre','$this->password','$this->usuario','$this->centro',1,NOW(),'$this->rol)");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	  public function ModificarPassword()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set passwordo=:pass
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);			
			$consulta->bindValue(':pass', $this->password, PDO::PARAM_STR);
			
			return $consulta->execute();
	 }

	
	 public function GuardarUsusario()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarUsuario();
	 		}else {
	 			$this->InsertarUsuario();
	 		}

	 }

  	public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,password,usuario,centro,habilitado,fechaAlta,fechaUltimoAcceso from usuario");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUnUsuario($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,password,usuario,centro,habilitado,fechaAlta,fechaUltimoAcceso from usuario where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('usuario');
			return $cdBuscado;				

			
	}

	public static function TraerUsuariosPorCentro($centro) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,password,usuario,centro,habilitado,fechaAlta,fechaUltimoAcceso from usuarios WHERE centro=?");
			$consulta->execute(array( $anio));
			$cdBuscado= $consulta->fetchObject('usuario');
      		return $cdBuscado;				

			
	}

	public static function validarUsuario($nombre, $pass)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre, password,usuario,centro,habilitado,fechaAlta,fechaUltimoAcceso from usuario where usuario = '$nombre' and password='$pass'");
		$consulta->execute();
		$miUsuario= $consulta->fetchObject('usuario');
		//$miUsuario->password = '';	
		return $miUsuario;
	}

	public static function UltimoAcceso($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuario` SET `FechaUltimoAcceso`=NOW() WHERE Id =$id");
		$consulta->execute();
	}

}
