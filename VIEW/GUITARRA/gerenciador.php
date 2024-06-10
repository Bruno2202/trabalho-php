<?php

include_once __DIR__ . '../../../BLL/Guitarra.php';

use BLL\Guitarra;

$bllGuit = new \BLL\Guitarra();
$lstGuit = $bllGuit->Select();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/gerenciadorGuit.css">
    <title>Gerenciador de Guitarras</title>

</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="app_name">SOUNDS | GUITARRAS</h1>
            <div class="nav_icons">
                <span class="material-symbols-outlined">
                    search
                </span>
                <a class="material-symbols-outlined home_icon" href="../home.php">
                    home
                </a>
            </div>
        </header>

        <table class="table">
            <tr>
                <th class="">ID</th>
                <th>Descrição</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>N° Cordas</th>
                <th>Cor</th>
                <th></th>
            </tr>

            <?php foreach ($lstGuit as $guit) { ?>
                <tr>
                    <td><?php echo $guit->getId(); ?></td>
                    <td><?php echo $guit->getDescricao(); ?></td>
                    <td><?php echo $guit->getModelo(); ?></td>
                    <td><?php echo $guit->getMarca(); ?></td>
                    <td><?php echo $guit->getAno(); ?></td>
                    <td><?php echo $guit->getNumCordas(); ?></td>
                    <td><?php echo $guit->getCor(); ?></td>
                    <td>
                        <span 
                            class="material-symbols-outlined delete" 
                            onclick="JavaScript: remover( <?php echo $guit->getId(); ?> )"
                        >
                            delete 
                        </span>
                        <span 
                            class="material-symbols-outlined edit"
                            onclick="JavaScript:location.href='cadastro.php?id=' + '<?php echo $guit->getId(); ?>'"
                        >
                            edit
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>
</body>

</html>

<script>
    function remover(id) {
        if (confirm('Excluir Guitarra ' + id + '?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>