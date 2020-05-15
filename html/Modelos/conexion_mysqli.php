<?php
class conexion_mysqli {
    private $servidorBD;
	private $usuario;
    private $passwd;
    private $BD;
    private $conexion;

	public function __construct () {
        $this->servidorBD = 'localhost';
        $this->usuario = 'mks';
        $this->passwd = 'RiveRcap137';
        $this->BD = 'CRUD';
		$this->conexion = new mysqli($this->servidorBD, $this->usuario, $this->passwd, $this->BD);
		$this->conexion->set_charset('utf8');
	}

	public function consultar ($sql) {
		return $this->conexion->query($sql)->fetch_all();
	}

	public function actualizar ($sql) {
		return $this->conexion->query($sql);
	}

	public function cerrar () {
		$this->conexion->close();
	}
}