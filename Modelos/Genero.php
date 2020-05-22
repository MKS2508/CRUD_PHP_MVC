<?php
require_once 'conexion_mysqli.php';

class Genero
{

    public $idGenero;
    public $Nombre;
    public $NumPeliculas;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idGenero = 0;
        $this->Nombre = '';
        $this->NumPeliculas = 0;
        $this->conexion = new conexion_mysqli();
    }
    public static function contarNumFilas($idGenero){
        $conexion = new conexion_mysqli();
        $resultado = $conexion->actualizar("SELECT COUNT(*) FROM genero WHERE idGenero = $idGenero");
        $resultado2 = $resultado->fetch_array();
        $numFilas = intval($resultado2[0]);
        $conexion->cerrar();
        return $numFilas;
    }


    public static function listar()
    { //FUNCION PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar('SELECT * FROM genero');
        $conexion->cerrar();
        return $listado;
    }

    public static function obtenerPorId($idGenero)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM genero WHERE idGenero = $idGenero");
        $conexion->cerrar();
        return $listado;
    }

    public static function obtenerPeliculasPorGenero($idGenero) 
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $numFilas = $conexion->numFilas($idGenero);
        $listado = $conexion->consultar("SELECT * FROM pelicula WHERE idGenero = $idGenero ORDER BY idGenero DESC ");
        $conexion->cerrar();
        return $listado;
    }

    public function addGenero()
    { //FUNCION ANIADIR  DIRECTOR A LA BD
       //    $sql = "INSERT INTO genero (Nombre, NumPeliculas) VALUES ('$this->Nombre', $NumPeliculas)";
        $sql = "INSERT INTO prueba (PALIAR) VALUES ('s')";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    } 

    public function eliminarGenero()
    { //FUNCION ELIMINAR ELEMENTO DIRECTOR DE LA BD 
     //   $sql = "DELETE FROM directores WHERE idDirector = $this->idDirector";
        $sql = "DELETE FROM genero WHERE idGenero = '$this->idGenero';";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function editarGenero()
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $sql = "UPDATE genero SET (Nombre = '$this->Nombre', NumPeliculas = $this->NumPeliculas)";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function visualizarElemento()
    
    {
        header('Location: /html/Vistas/Peliculas/Genero_info.php'); //Genero info ejecuta obtenerpeliculasporgenero
    }

   
}
?>

