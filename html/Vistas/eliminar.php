<?php
	require_once '../Modelos/Director.php';
	$Director = Director::obtenerPorId($_GET['idDirector']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Eliminar</title>
</head>
<body>
	<header>
		<h1>Director</h1>
		<h2>Eliminar</h2>
    </header>
    <p>Desea eliminar el director: <?= $_GET['idDirector'] ?>?</p>
	<form action="../Controladores/DirectorController.php" method="post">
		<input name="a" type="submit" value="Eliminar" />
	</form>
</body>
</html>