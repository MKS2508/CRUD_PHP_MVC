<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Add Directores</title>
</head>
<?php require '../Parciales/navbar.php' ?>

<body>
	<header>
		<h1>Directores</h1>
		<h2>Add</h2>
	</header>

	<form action="../../Controladores/DirectorController.php" method="post">
        <input type="text" name="Nombre" placeholder="Nombre" required autofocus />
        <input type="text" name="Nacionalidad" placeholder="Nacionalidad" required autofocus />
		<input name="a" type="submit" value="Ingresar" />
	</form>
</body>
</html>