<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', 'bruno', 'sounds');

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Buscar todas as imagens
$sql = "SELECT id, nome, tipo, dados FROM imagens";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row['nome'] . "</h2>";
        echo '<img src="data:' . $row['tipo'] . ';base64,' . base64_encode($row['dados']) . '"/>';
        echo "</div>";
    }
} else {
    echo "Nenhuma imagem encontrada.";
}

// Fechar a conexão
$conn->close();
?>