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

       <form action="../../Controladores/GeneroController.php" method="post">

        <p>Nombre: <input type="text" name="usuario"></p>
        <p>Numero de peliculas: <input type="number" name="NumPeliculas"></p>

        <p><button type="submit" name="a" value="Add" class="btn">Añadir Género</button></p>
        <hr>
    </form>
        <p><a href="/html/Vistas/Generos.php" class="btn">Cancelar</a></p>
</body>
<?php require '../Parciales/footer.php' ?>

</html>