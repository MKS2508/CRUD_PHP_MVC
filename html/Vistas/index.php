<?php require_once '../Modelos/Director.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes/card.css">
    <title>Index</title>
</head>

<body>
    <h1>INDEX</h1>
    <h2>Listar director</h2>

    <a href="ingresar.php" class="btn">Ingresar nuevo director</a>
    <div class="wea">
        <main class="page-content">
            <?php foreach (Director::listar() as $fila) { ?>

                <div class="card">
                    <div class="content">
                        <h2 class="title"><?= $fila[1] ?></h2>
                        <p class="copy"> Nacionalidad : <?= $fila[2] ?> </p>
                        <p class="copy"> ID :  <?= $fila[0] ?> </p>
                        <a href="editar.php?idDirector=<?=$fila[0]?>" class="btn">Editar</a>
                        <a href="eliminar.php?idDirector=<?=$fila[0]?>" class="btn">Eliminar</a>
                    </div>
                </div>
            <?php } ?>
        </main>

    </div>


</body>

</html>