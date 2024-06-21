<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/registro.css">
    <title>Sounds | Registro</title>
</head>

<body>
    <div class="container">
        <a class="home_icon" href="../home.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
            </svg>
        </a>
        <div class="card_left">
            <img class="vector" src="../../ASSETS/IMG/vector.png">
        </div>
        <div class="card_right">
            <form class="form" name="regForm" method="POST" action="script.php" onsubmit="return validateForm()">
                <h1 class="form_title">Registro</h1>
                <div class="form_inputs">
                    <input class="form_input" name="name" type="text" placeholder="Nome" maxlength="50" required>
                    <input class="form_input" name="email" type="text" placeholder="Email" maxlength="50" required>
                    <input class="form_input" name="password" type="password" placeholder="Senha" maxlength="50" required>
                </div>
                <a class="form_link" href="../LOGIN/login.php">Já tem uma <span class="link_acc">&nbspconta?</span></a>
                <button class="form_button" type="submit">
                    Concluir
                </button>
            </form>
        </div>
    </div>

    <script src="validacao.js"></script>
</body>
 
</html>