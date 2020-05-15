<?php
require_once 'conexion_mysqli.php';

class Usuario{
    public $idUsuario;
    public $Email;
    public $Password;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idUsuario = 0;
        $this->Email = '';
        $this->Password = '';
        $this->conexion = new conexion_mysqli();
    }

    public static function obtenerPorId($idDirector)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM Directores WHERE idDirector = $idDirector");
        $conexion->cerrar();
        return $listado[0];
    }

    public function usuarioExiste($Email, $Password){
        $conexion = new conexion_mysqli();
        $md5pass = md5($Password);
        $listado = $conexion->consultar("SELECT * FROM Usuario WHERE Email = :Email AND Password = :Password");
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>