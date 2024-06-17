<?php
include_once __DIR__ . "../../../MODEL/Guitarra.php";
include_once __DIR__ . "../../../BLL/Guitarra.php";
$id = $_GET['id'];

$bllGuit = new BLL\Guitarra();
$guitarra = $bllGuit->SelectByID($id);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/cadastroGuit.css">
    <title>Editar Guitarras</title>

</head>

<body>
    <div class="container">

        <header class="header">
            <a class="app_name" href="../adm.php">SOUNDS | GUITARRAS</a>
            <div class="nav_icons">
                <span class="material-symbols-outlined">
                    search
                </span>
                <a class="material-symbols-outlined home_icon" href="../home.php">
                    home
                </a>
            </div>
        </header>

        <form class="form" action="update.php" method="POST">
            <div class="form_inputs">
                <div class="input_field">
                    <label for="id">ID</label>
                    <input class="input" placeholder="ID" id="id" name="id" type="text" value="<?php echo $guitarra->getID(); ?>" readonly>
                </div>

                <div class="input_field">
                    <label for="descricao">DESCRICÃO</label>
                    <input class="input" placeholder="Descrição" id="descricao" name="descricao" type="text" value="<?php echo $guitarra->getDescricao(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="modelo">MODELO</label>
                    <input class="input" placeholder="Modelo" id="modelo" name="modelo" type="text" value="<?php echo $guitarra->getModelo(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="marca">MARCA</label>
                    <input class="input" placeholder="Marca" id="marca" name="marca" type="text" value="<?php echo $guitarra->getMarca(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="ano">ANO</label>
                    <input class="input" placeholder="Ano" id="ano" name="ano" type="text" value="<?php echo $guitarra->getAno(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="numCordas">N° CORDAS</label>
                    <input class="input" placeholder="N° Cordas" id="numCordas" name="numCordas" type="text" value="<?php echo $guitarra->getNumCordas(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="cor">COR</label>
                    <input class="input" placeholder="Cor" id="cor" name="cor" type="text" value="<?php echo $guitarra->getCor(); ?>" require>
                </div>
            </div>
            <button class="save" type="submit">
                Salvar
            </button>
        </form>

    </div>
    </div>
</body>

</html>