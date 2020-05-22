<?php require_once '../../Modelos/Genero.php' ?>
<?php require '../Parciales/navbar.php' ;
$index =0;
?>
//TODO 
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/html/Assets/css/card.css">
    <link rel="stylesheet" href="/html/Assets/css/materialize.css">
    <link rel="stylesheet" href="/html/Assets/css/pelicula.css">
    <script src="/html/Assets/js/materialize.js"></script>

    <title>Peliculas</title>
</head>

<body>
<div class="titulo">
    <h3>Generos: </h3>  
    <a href="/html/Vistas/Generos/addGenero.php" class="btn">Añadir Generos</a>
</div>

<main class="page-content">
<?php foreach (Genero::listar() as $fila) { ?>
    <?php $index++?>
    <div class="card">
        <div class="content">
            <h2 class="title"><?= $fila[1] ?> / ID = <?= $fila[0] ?></h2>
            <a href="/html/Vistas/Generos/Genero_info.php?idGenero=<?=$fila[0]?>" class="btn">VER DETALLES</a>
        </div>
    </div>
                <?php if($index>1) {?>
                <?php $index=0 ?>
                <?php echo "</main>"; ?>
                <?php $clase='="'; ?>
                <?php $clase2='">'; ?>
                <?php echo "<main class"?> <?=$clase?> <?php echo "page-content"?> <?=$clase2?>
                <?php } ?>
            <?php } ?>
            </main>
</body>
<?php require '../Parciales/footer.php' ?>

</html>