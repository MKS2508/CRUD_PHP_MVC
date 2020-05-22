<?php
require_once 'conexion_mysqli.php';

class Usuario{
    public $idPuntuacion;
    public $Puntuacion;
    public $idUsuario;
    public $idPelicula;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idPuntuacion = 0;
        $this->Puntuacion = 0;
        $this->idUsuario = 0;
        $this->idPelicula = 0;
        $this->conexion = new conexion_mysqli();
    }


    public static function listar()
    { //FUNCI ON PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar('SELECT * FROM puntuacion');
        $conexion->cerrar();
        return $listado;  
    }

    public static function obtenerPorId($idPuntuacion)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM puntuacion WHERE idPuntuacion = $idPuntuacion");
        $conexion->cerrar();
        return $listado;
    }

    public function Puntuar()
    { //FUNCION ANIADIR ELEMENTO  A LA BD
        $sql = "INSERT INTO puntuacion (Puntuacion, idUsuario, idPelicula) VALUES ('$this->Puntuacion', '$this->idUsuario', '$this->idPelicula')";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    } 

    public function editarPuntuacion()
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $sql = "UPDATE puntuacion SET Puntuacion = '$this->Puntuacion' WHERE idPuntuacion = $this->idPuntuacion";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function puntuacionMedia($idPelicula)
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT AVG(Puntuacion) FROM puntuacion WHERE idPelicula = $idPelicula" );
        $conexion->cerrar();
        return $listado;
    }

    public function usuarioPuntuado($idPelicula)
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT idUsuario FROM puntuacion WHERE idPelicula = $idPelicula" );
        $conexion->cerrar();
        return $listado;
    }
}
?>

