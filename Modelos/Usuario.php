<?php
require_once 'conexion_mysqli.php';

class Usuario{
    public $idUsuario;
    public $Email;
    public $Password;
    public $rolAdmin;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idUsuario = 0;
        $this->Email = '';
        $this->Password = '';
        $this->rolAdmin = false;
        $this->conexion = new conexion_mysqli();
    }


    public static function listar()
    { //FUNCI ON PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar('SELECT * FROM usuario');
        $conexion->cerrar();
        return $listado;  
    }

    public static function obtenerPorId($idUsuario)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM usuario WHERE idUsuario = $idUsuario");
        $conexion->cerrar();
        return $listado[0];
    }

    public function registrar()
    { //FUNCION ANIADIR ELEMENTO DIRECTOR A LA BD
        $passwd = password_hash($this->Password, PASSWORD_BCRYPT); //encriptar
        $sql = "INSERT INTO usuario (Email, Password, rolAdmin) VALUES ('$this->Email', '$passwd', FALSE)";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } 

    public function acceder()
    { //FUNCION ANIADIR ELEMENTO DIRECTOR A LA BD
            $conexion = new conexion_mysqli();
            $listado = $conexion->consultar("SELECT idUsuario, Email, Password FROM usuario WHERE Email = $this->Email");
            $conexion->cerrar();
            return $listado[0];
            $numeroRows = mysqli_num_rows($listado);
            if (numeroRows > 0 && password_verify($this->Password, $listado['Password'])) {
                $_SESSION['user_id'] = $listado['idUsuario'];}
            

    } 
}
?>

