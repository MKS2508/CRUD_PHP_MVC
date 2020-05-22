<?php
require_once 'conexion_mysqli.php';

class Pelicula{
    public $idPelicula;
    public $Titulo;
    public $Sinopsis;
    public $FechaEstreno;
    public $DuracionMin;
    public $idGenero;
    public $idDirector;
    public $PuntuacionRef;
    public $Calificacion;
    private $conexion;

  
     

    public function __construct()
    { //CONSTRUCTOR
        $this->idPelicula = 0;
        $this->Titulo = '';
        $this->Sinopsis = '';
        $this->FechaEstreno = '';
        $this->DuracionMin = 0;
        $this->idGenero = 0;
        $this->idDirector = 0;
        $this->PuntuacionRef = 0.0;
        $this->Calificacion = '';
        $this->conexion = new conexion_mysqli();
    }


    public static function listar()
    { //FUNCION PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $sql = "SELECT pelicula.idPelicula, pelicula.Titulo, pelicula.Sinopsis, pelicula.DuracionMin, pelicula.idGenero, pelicula.idDirector, pelicula.PuntuacionRef, pelicula.Calificacion, genero.Nombre FROM pelicula, genero WHERE pelicula.idGenero=genero.idGenero";
        $listado = $conexion->consultar($sql);
        $conexion->cerrar();
        return $listado;
    }


    public static function obtenerPorId($idPelicula)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $sql = "SELECT pelicula.idPelicula, pelicula.Titulo, pelicula.Sinopsis, pelicula.DuracionMin, pelicula.idGenero, pelicula.idDirector, pelicula.PuntuacionRef, pelicula.Calificacion, genero.Nombre, directores.Nombre, pelicula.FechaEstreno FROM pelicula, genero, directores WHERE pelicula.idGenero=genero.idGenero AND pelicula.idDirector=directores.idDirector AND pelicula.idPelicula = $idPelicula";
        $listado = $conexion->consultar($sql);
        $conexion->cerrar();
        return $listado;
    }
    public static function obtenerPeliculasPorGenero($idGenero) //FIXME
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT idPelicula, Titulo, idGenero, Nombre FROM pelicula , genero WHERE idGenero = $idGenero");
        $conexion->cerrar();
        return $listado;
    }

    public function addPelicula()
    { //FUNCION ANIADIR ELEMENTO DIRECTOR A LA BD
        $sql = "INSERT INTO pelicula (Titulo, Sinopsis, DuracionMin, idGenero, idDirector, PuntuacionRef, Calificacion) VALUES ('$this->Titulo', '$this->Sinopsis'  , $this->DuracionMin, $this->idGenero, $this->idDirector , $this->PuntuacionRef, '$this->Calificacion')";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    } 

    public function eliminarPelicula()
    { //FUNCION ELIMINAR ELEMENTO DIRECTOR DE LA BD 
     //   $sql = "DELETE FROM directores WHERE idDirector = $this->idDirector";
        
        $sql = "DELETE FROM directores WHERE idDirector = '$this->idDirector';";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function editarPelicula()
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $sql = "UPDATE pelicula SET (Titulo = '$this->Titulo',  Sinopsis = '$this->Sinopsis', FechaEstreno = '$this->FechaEstreno', DuracionMin = $this->DuracionMin, idGenero = $this->idGenero, idDirector =  $this->idDirector, PuntuacionRef = $this->PuntuacionRef)";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }


    public function visualizarElemento($idPelicula)
    
    {
        header('Location: /html/Vistas/Peliculas/Pelicula_info.php?idPelicula=$idPelicula');
    }

   
}
?>

