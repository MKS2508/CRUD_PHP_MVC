<?php require '../Parciales/navbar.php' ?>
<?php require_once '../../Modelos/Genero.php';
$id = $_GET['idGenero'];
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
<?php foreach (Genero:: obtenerPorId($id) as $fila) { ?>
    <div class="titulo">
    <h1>Detalles de <?= $fila[1] ?></h1>
    <p>ID: <?= $fila[0] ?></p>  
    <p>Nombre: <?= $fila[1] ?></p>      
    <p>Numero de peliculas de este Genero: <?= $fila[2] ?></p>
    <a href="/html/Vistas/Generos/editarGenero.php?idGenero=<?=$fila[0]?>" class="btn">Editar</a>
    <a href="/html/Vistas/Generos/eliminarGenero.php?idGenero=<?=$fila[0]?>" class="btn">Eliminar</a>
    <a href="/html/Vistas/Generos/Generos.php" class="btn">Volver</a>
    </div>

<?php } ?>

<div class="titulo">
    <h3>Peliculas de este genero: </h3>    
</div>
    <div id="movie-card-list">
    <?php foreach (Genero:: obtenerPeliculasPorGenero($id) as $peli) { ?>
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