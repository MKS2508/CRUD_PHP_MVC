<?php require '../Parciales/navbar.php' ?>
<?php require_once '../../Modelos/Director.php';
$id = $_GET['idDirector'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/html/Assets/css/pelicula.css">
    <link rel="stylesheet" href="/html/Assets/css/materialize.css">

    <title>Detalles de pelicula</title>
</head>
<body>
<?php foreach (Director:: obtenerPorId($id) as $fila) { ?>
    <div class="titulo">
    <h1>Detalles de <?= $fila[1] ?></h1>
    <p>ID: <?= $fila[0] ?></p>  
    <p>Nombre: <?= $fila[1] ?></p>      
    <p>Nacionalidad: <?= $fila[2] ?></p>
    </div>
<?php } ?>
<div class="titulo">
    <a href="/html/Vistas/Directores/editar.php?idDirector=<?=$fila[0]?>" class="btn">Editar</a>
    <a href="/html/Vistas/Directores/eliminar.php?idDirector=<?=$fila[0]?>" class="btn">Eliminar</a>
    <a href="/html/Vistas/Directores/Directores.php" class="btn">Volver</a>
</div>
<div class="titulo">
    <h3>Peliculas de este director: </h3>    
</div>
<div id="movie-card-list">
            <?php foreach (Director::obtenerPeliculasPorDirector($id)  as $peli) { ?>
                <div class="movie-card" data-movie="Akira">
                <div class="movie-card__overlay"></div>
                <div class="movie-card__share">
    </div>
    <div class="movie-card__content">
      <div class="movie-card__header">
        <h3 class="movie-card__title"><?= $peli[1] ?> / ID = <?= $peli[0] ?></h3>
        <h4 class="movie-card__info">(<?= $peli[3] ?>) GENERO: <?= $peli[5] ?></h4>
      </div>
      <p class="movie-card__desc"><?= $peli[2] ?></p>
      <a href="/html/Vistas/Peliculas/Pelicula_info.php?idPelicula=<?= $peli[0] ?>" class="btn">VER DETALLES DE LA PELICULA</a>
    </div>
  </div>
            <?php } ?>

</div>

<br>
<br>
</body>
</html>


<?php require '../Parciales/footer.php' ?>