<?php require_once '../Modelos/Director.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$Director = new Director();

	switch ($accion) {
		case 'Ingresar':
			$Director->Nombre = $_POST['Nombre'];
			$Director->Nacionalidad = $_POST['Nacionalidad'];
			$Director->ingresar();
			break;
		case 'Editar':
			$Director->idDirector= $_POST['idDirector'];
			$Director->Nombre = $_POST['Nombre'];
			$Director->Nacionalidad = $_POST['Nacionalidad'];
			$Director->editar();
			break;
		case 'Eliminar':
			$Director->idDirector= $_POST['idDirector'];
			$Director->eliminar();
			break;
	}
}

header('Location: ../Vistas/index.php');