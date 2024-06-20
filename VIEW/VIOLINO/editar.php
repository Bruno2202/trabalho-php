<?php

include_once __DIR__ . "../../../MODEL/Violino.php";
include_once __DIR__ . "../../../BLL/Violino.php";
$id = $_GET['id'];

$bllViolino = new BLL\Violino();
$violino = $bllViolino->SelectByID($id);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Editar Violinos</title>

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

        <form class="form" action="./OPERACOES/update.php" method="POST" enctype="multipart/form-data">
            <div class="form_inputs">
                <div class="input_field">
                    <label for="id">ID</label>
                    <input class="input" placeholder="ID" id="id" name="id" type="text" value="<?php echo $violino->getID(); ?>" readonly>
                </div>
                
                <div class="input_field">
                    <label for="descricao">DESCRICÃO</label>
                    <input class="input" placeholder="Descrição" id="descricao" name="descricao" type="text" value="<?php echo $violino->getDescricao(); ?>" require>
                </div>
                
                <div class="input_field">
                    <label for="modelo">MODELO</label>
                    <input class="input" placeholder="Modelo" id="modelo" name="modelo" type="text" value="<?php echo $violino->getModelo(); ?>" require>
                </div>
                
                <div class="input_field">
                    <label for="marca">MARCA</label>
                    <input class="input" placeholder="Marca" id="marca" name="marca" type="text" value="<?php echo $violino->getMarca(); ?>" require>
                </div>
            </div>

            <div class="form_inputs">
                <div class="input_field">
                    <label for="ano">ANO</label>
                    <input class="input" placeholder="Ano" id="ano" name="ano" type="text" value="<?php echo $violino->getAno(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="cor">COR</label>
                    <input class="input" placeholder="Cor" id="cor" name="cor" type="text" value="<?php echo $violino->getCor(); ?>" require>
                </div>

                <div class="input_field">
                    <label for="qtdeEstoque">QTDE ESTOQUE</label>
                    <input class="input" placeholder="Quantidade em estoque" id="qtdeEstoque" name="qtdeEstoque" type="text" value="<?php echo $violino->getQtdeEstoque(); ?>" required>
                </div>

                <div class="input_field">
                    <label for="vlrVenda">VALOR VENDA</label>
                    <input class="input" placeholder="Valor de venda" id="vlrVenda" name="vlrVenda" type="text"  value="<?php echo $violino->getVlrVenda(); ?>" required>
                </div>

                <div class="input_field">
                    <label for="imagem">IMAGEM:</label>
                    <?php if ($violino->getImagem()): ?>
                        <img src="data:<?php echo $violino->getTipoImagem(); ?>;base64,<?php echo base64_encode($violino->getImagem()); ?>" alt="Imagem da violino">
                        <p>Imagem atual</p>
                    <?php else: ?>
                        <p>Nenhuma imagem selecionada</p>
                    <?php endif; ?>
                    <input type="file" name="imagem" id="imagem">
                </div>
            </div>

            <button class="save" type="submit">
                Salvar
            </button>
        </form>

    </div>
</body>

</html>