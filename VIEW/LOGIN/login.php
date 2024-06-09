<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Sounds | Login</title>
</head>

<body>
    <div class="container">
        <a class="material-symbols-outlined home_icon" href="../home.php">
            home
        </a>
        <div class="card_left">
            <img class="vector" src="../../ASSETS/IMG/vector.png">
        </div>
        <div class="card_right">
            <form class="form" method="POST" action="./script.php">
                <h1 class="form_title">Entrar</h1>
                <div class="form_inputs">
                    <input class="form_input" name="email" type="text" placeholder="Email" required>
                    <input class="form_input" name="password" type="password" placeholder="Senha" required>
                </div>
                <a class="form_link" href="../registro.php">Ainda não possui uma<span class="link_acc">&nbspconta?</span></a>
                <button class="form_button" name="action" type="submit">
                    Acessar
                </button>
            </form>
        </div>
    </div>
</body>
 
</html>