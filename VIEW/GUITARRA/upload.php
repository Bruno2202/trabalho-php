<?php
    if (isset($_POST['submit'])) {
        // Informações do arquivo
        $nomeImagem = $_FILES['imagem']['name'];
        $tipoImagem = $_FILES['imagem']['type'];
        $tamanhoImagem = $_FILES['imagem']['size'];
        $dadosImagem = file_get_contents($_FILES['imagem']['tmp_name']);

        // Conectar ao banco de dados
        $conn = new mysqli('localhost', 'root', 'bruno', 'sounds');

        // Verificar conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Preparar e executar a inserção
        $stmt = $conn->prepare("INSERT INTO imagens (nome, tipo, dados) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nomeImagem, $tipoImagem, $dadosImagem);

        if ($stmt->execute()) {
            echo "Imagem carregada com sucesso!";
        } else {
            echo "Erro ao carregar imagem: " . $stmt->error;
        }

        // Fechar a conexão
        $stmt->close();
        $conn->close();
    }
?>