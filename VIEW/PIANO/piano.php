<?php

include_once __DIR__ . '../../../BLL/Piano.php';

use BLL\Piano;

$bllPiano = new \BLL\Piano();
$lstPiano = $bllPiano->Select();

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
    <title>Piano</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="app_name">SOUNDS</h1>
            <nav class="navigation">
                <a class="nav_option" onclick="scrollToBottom()">PRODUTOS</a>
                <a class="nav_option" href="../GUITARRA/guitarra.php">GUITARRA</a>
                <a class="nav_option" href="../VIOLINO/violino.php">VIOLINO</a>
                <a class="nav_option" href="../BATERIA/bateria.php">BATERIA</a>
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
                    <img src="../../ASSETS/IMG/carrosel/piano.png" class="d-block w-100" alt="C3">
                </div>
            </div>
        </div>

        <div class="disclaimer">
            <h1 class="disclaimer_title">Harmonia envolvente</h1>
            <p class="disclaimer_phrase">com o piano, crie melodias cativantes e emocione multidões com sua música encantadora e inspiradora.</p>
        </div>

        <div class="instruments">
        <div class="instruments">
            <?php foreach ($lstPiano as $piano) { 
                if ($piano->getQtdeEstoque() > 0 ) {
            ?>
                <div class="instrument_container">
                    <div class="instruments_card" id="<?php echo $piano->getID(); ?>">
                        <?php echo '<img class="instrument_img" src="data: ' . $piano->getTipoImagem() . ';base64,' . base64_encode($piano->getImagem()) . '"/>'; ?>
                        <h3 class="instrument_desc"><?php echo $piano->getDescricao(); ?></h3>
                        <p class="instrument_value">R$ <?php echo $piano->getVlrVenda(); ?></p>
                    </div>
                    <button class="instrument_buy" onclick="showModal('modalOverlay<?php echo $piano->getID(); ?>')">
                        Comprar
                    </button>
                    <div class="buy_modalOverlay" id="modalOverlay<?php echo $piano->getID(); ?>">
                        <modal class="buy_modal" id="modal">
                            <h1>Confirmar compra</h1>
                            <div class="instrument_info">
                                <h3>Produto: Bateria <?php echo $piano->getDescricao(); ?></h3>
                                <h4>Quantidade: <input type="number" name="quant" id="quant<?php echo $piano->getID(); ?>" max="<?php echo $piano->getQtdeEstoque(); ?>" min="1" value="1" required="" onchange="updateTotal( <?php echo $piano->getVlrVenda(); ?>, 'quant<?php echo $piano->getID(); ?>', 'total<?php echo $piano->getID(); ?>')"></h4>
                                <separator class="separator"></separator>
                                <h5>Valor unitário: R$ <?php echo $piano->getVlrVenda(); ?></h4>
                                <h4 id="total<?php echo $piano->getID(); ?>">Total: R$ <?php echo $piano->getVlrVenda(); ?></h4>
                            </div>
                        </modal>
                        <button class="instrument_confirm" onclick="JavaScript:location.href='./OPERACOES/updateEstoque.php?id=' + '<?php echo $piano->getId(); ?>' + '&qtdeCompra=' + getQtdeCompra('quant<?php echo $piano->getID(); ?>')">
                                Confirmar compra
                        </button>
                    </div>
                </div>
            <?php }} ?>
        </div>
    </div>

    <script src="../js/buyModal.js"></script>
    <script>
        function scrollToBottom() {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>