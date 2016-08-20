<?php
require_once"accesoDatos.php";
class Alumno
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $id;
	private $nombre;
 	private $apellido;
  	private $legajo;
  	private $foto;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function GetId()
	{
		return $this->id;
	}
	public function GetApellido()
	{
		return $this->apellido;
	}
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetLegajo()
	{
		return $this->legajo;
	}
	public function GetFoto()
	{
		return $this->foto;
	}

	public function SetId($valor)
	{
		$this->id = $valor;
	}
	public function SetApellido($valor)
	{
		$this->apellido = $valor;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetLegajo($valor)
	{
		$this->legajo = $valor;
	}
	public function SetFoto($valor)
	{
		$this->foto = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($legajo=NULL)
	{
		if($legajo != NULL){
			$obj = Alumno::TraerUnAlumno($legajo);
			
			$this->apellido = $obj->apellido;
			$this->nombre = $obj->nombre;
			$this->legajo = $legajo;
			$this->foto = $obj->foto;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->apellido."-".$this->nombre."-".$this->legajo."-".$this->foto;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE
	public static function TraerUnAlumno($idParametro) 
	{	


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from alumno where id =:id");
		$consulta->bindValue(':id', $idParametro, PDO::PARAM_INT);
		$consulta->execute();
		$AlumnoBuscada= $consulta->fetchObject('Alumno');
		return $AlumnoBuscada;	
					
	}
	
	public static function TraerTodosLosAlumnos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from alumno");
		$consulta->execute();			
		$arrAlumnos= $consulta->fetchAll(PDO::FETCH_CLASS, "Alumno");	
		return $arrAlumnos;
	}
	
	public static function Borrar($idParametro)
	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from alumno	WHERE id=:id");	
		$consulta->bindValue(':id',$idParametro, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	
	public static function Modificar($Alumno)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update alumno 
				set nombre=:nombre,
				apellido=:apellido,
				foto=:foto
				WHERE id=:id");
			$consulta->bindValue(':id',$Alumno->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$Alumno->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $Alumno->apellido, PDO::PARAM_STR);
			$consulta->bindValue(':foto', $Alumno->foto, PDO::PARAM_STR);
			return $consulta->execute();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//

	public static function Insertar($Alumno)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into Alumno (nombre,apellido,legajo,foto)values(:nombre,:apellido,:legajo,:foto)");
				$consulta->bindValue(':nombre',$Alumno->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido', $Alumno->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':legajo', $Alumno->legajo, PDO::PARAM_INT);
				$consulta->bindValue(':foto', $Alumno->foto, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	
				
	}	
//--------------------------------------------------------------------------------//

}