<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro de Pianos</title>
</head>

<body>
    <div class="container">

        <header class="header">
            <a class="app_name" href="../adm.php">SOUNDS | PIANOS</a>
            <div class="nav_icons">
                <span class="material-symbols-outlined">
                    search
                </span>
                <a class="material-symbols-outlined home_icon" href="../home.php">
                    home
                </a>
            </div>
        </header>

        <form class="form" name="cadForm" action="./OPERACOES/create.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()"> 
            <div class="form_inputs">
                <div class="input_field">
                    <label for="descricao">DESCRICÃO</label>
                    <input class="input" placeholder="Descrição" id="descricao" name="descricao" type="text" require>
                </div>

                <div class="input_field">
                    <label for="modelo">MODELO</label>
                    <input class="input" placeholder="Modelo" id="modelo" name="modelo" type="text" require>
                </div>

                <div class="input_field">
                    <label for="marca">MARCA</label>
                    <input class="input" placeholder="Marca" id="marca" name="marca" type="text" require>
                </div>

                <div class="input_field">
                    <label for="ano">ANO</label>
                    <input class="input" placeholder="Ano" id="ano" name="ano" type="text" require>
                </div>
            </div>
            <div class="form_inputs">
                <div class="input_field">
                    <label for="numTeclas">N° TECLAS</label>
                    <input class="input" placeholder="N° Teclas" id="numTeclas" name="numTeclas" type="text" require>
                </div>

                <div class="input_field">
                    <label for="cor">COR</label>
                    <input class="input" placeholder="Cor" id="cor" name="cor" type="text" require>
                </div>

                <div class="input_field">
                    <label for="qtdeEstoque">QTDE ESTOQUE</label>
                    <input class="input" placeholder="Quantidade em estoque" id="qtdeEstoque" name="qtdeEstoque" type="text" require>
                </div>

                <div class="input_field">
                    <label for="vlrVenda">VALOR VENDA</label>
                    <input class="input" placeholder="Valor de venda" id="vlrVenda" name="vlrVenda" type="text" require>
                </div>

                <div class="input_field">
                    <label for="imagem">IMAGEM:</label>
                    <input type="file" name="imagem" id="imagem" required>
                </div>
            </div>
            <button class="save" type="submit">
                Cadastrar
            </button>
        </form>

    </div>

    <script src="validCad.js"></script>
</body>

</html>