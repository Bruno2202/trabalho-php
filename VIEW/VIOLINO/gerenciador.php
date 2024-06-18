<?php

include_once __DIR__ . '../../../BLL/Violino.php';

use BLL\Violino;

$bllViolino = new \BLL\Violino();
$lstViolino = $bllViolino->Select();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/gerenciador.css">
    <title>Gerenciador de Violinos</title>

</head>

<body>
    <div class="container">
        <header class="header">
            <a class="app_name" href="../adm.php">SOUNDS | VIOLINOS</a>
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
                <th>N° Teclas</th>
                <th>Cor</th>
                <th></th>
            </tr>

            <?php foreach ($lstViolino as $violino) { ?>
                <tr>
                    <td><?php echo $violino->getId(); ?></td>
                    <td><?php echo $violino->getDescricao(); ?></td>
                    <td><?php echo $violino->getModelo(); ?></td>
                    <td><?php echo $violino->getMarca(); ?></td>
                    <td><?php echo $violino->getAno(); ?></td>
                    <td><?php echo $violino->getCor(); ?></td>
                    <td>
                        <span 
                            class="material-symbols-outlined delete" 
                            onclick="JavaScript: remover( <?php echo $violino->getId(); ?> )"
                        >
                            delete 
                        </span>
                        <span 
                            class="material-symbols-outlined edit"
                            onclick="JavaScript:location.href='editar.php?id=' + '<?php echo $violino->getId(); ?>'"
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
        if (confirm('Excluir Violino ' + id + '?')) {
            location.href = './OPERACOES/delete.php?id=' + id;
        }
    }
</script>