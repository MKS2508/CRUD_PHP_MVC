<?php
	require_once '../../Modelos/Director.php';
	$Director = Director::obtenerPorId($_GET['idDirector']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Editar</title>
</head>
<?php require '../Parciales/navbar.php' ?>

<body>
	<header>
		<h1>Director</h1>
		<h2>Editar</h2>
		<h3>ID SIN BASE64 DECODE : <?= $_GET['idDirector'] ?></h3>
		<h3>ID CON BASE64 DECODE : <?= base64_decode($_GET['idDirector']) ?></h3>
	</header>
	<form action="../../Controladores/DirectorController.php" method="post">
        <input type="hidden" name="idDirector" value="<?= $_GET['idDirector'] ?>" /> 
		<input type="text" name="Nombre" placeholder="Nombre" required autofocus />
		<input type="text" name="Nacionalidad" placeholder="Nacionalidad" required autofocus />
		<input name="a" type="submit" value="Editar" />
	</form>
</body>
</html>