<?php
require_once 'conexion_mysqli.php';

class Director
{
    public $idDirector;
    public $Nombre;
    public $Nacionalidad;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idDirector = 0;
        $this->Nombre = '';
        $this->Nacionalidad = '';
        $this->conexion = new conexion_mysqli();
    }

    public static function listar()
    { //FUNCION PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar('SELECT * FROM directores');
        $conexion->cerrar();
        return $listado;
    }

    public static function obtenerPorId($idDirector)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM directores WHERE idDirector = $idDirector");
        $conexion->cerrar();
        return $listado;
    }

    public function ingresar()
    { //FUNCION ANIADIR ELEMENTO DIRECTOR A LA BD
        $sql = "INSERT INTO directores (Nombre, Nacionalidad) VALUES ('$this->Nombre', '$this->Nacionalidad')";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function eliminar($idDirector)
    { //FUNCION ELIMINAR ELEMENTO DIRECTOR DE LA BD 
     //   $sql = "DELETE FROM directores WHERE idDirector = $this->idDirector";
        
        $sql = "DELETE FROM directores WHERE idDirector = $idDirector";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function editar()
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $sql = "UPDATE directores SET Nombre = '$this->Nombre', Nacionalidad = '$this->Nacionalidad' WHERE idDirector = $this->idDirector";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }
    
    public static function obtenerPeliculasPorDirector($idDirector) 
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM pelicula WHERE idDirector = $idDirector");
        $conexion->cerrar();
        return $listado;
    }
}
