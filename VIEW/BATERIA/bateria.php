<?php

include_once __DIR__ . '../../../BLL/Bateria.php';

use BLL\Bateria;

$bllBateria = new \BLL\Bateria();
$lstBateria = $bllBateria->Select();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/instrumentos.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Bateria</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="app_name">SOUNDS</h1>
            <nav class="navigation">
                <a class="nav_option">SOBRE NÓS</a>
                <a class="nav_option">CONTATO</a>
                <a class="nav_option">PRODUTOS</a>
                <a class="nav_option" href="https://github.com/Bruno2202/trabalho-php">MAIS</a>
            </nav>
            <div class="nav_icons">
                <a href="./LOGIN/login.php" class="material-symbols-outlined">
                    person
                </a>
                <span class="material-symbols-outlined searchIcon" onclick="">
                    search
                </span>
            </div>
        </header>

        <div id="carouselExample" class="carousel slide" style="width: 100vw;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../ASSETS/IMG/carrosel/guitarra.png" class="d-block w-100" alt="C3">
                </div>
            </div>
        </div>

        <div class="disclaimer">
            <h1 class="disclaimer_title">Ritmo contagiante</h1>
            <p class="disclaimer_phrase">com a bateria, transforme sua música e energize multidões com batidas envolventes e poderosas performances.</p>
        </div>

        <div class="instruments">
            <?php foreach ($lstBateria as $bateria) { ?>
                <div class="instruments_card" id="<?php echo $bateria->getID(); ?>">
                    <?php echo '<img class="instrument_img" src="data: ' . $bateria->getTipoImagem() . ';base64,' . base64_encode($bateria->getImagem()) . '"/>'; ?>
                    <h3 class="instrument_desc"><?php echo $bateria->getDescricao(); ?></h3> 
                    <p class="instrument_value">R$ <?php echo $bateria->getVlrVenda(); ?></p> 
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>