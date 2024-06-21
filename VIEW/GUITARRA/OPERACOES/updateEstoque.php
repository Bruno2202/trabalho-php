<?php 
namespace VIEW\Guitarra;

include_once __DIR__ . '../../../../MODEL/Guitarra.php'; 
include_once __DIR__ . '../../../../BLL/Guitarra.php'; 

use \BLL\Guitarra as BLLGuitarra;

$id = $_GET['id'];
$qtdeCompra = $_GET['qtdeCompra'];

$bllGuitarra = new BLLGuitarra();
$guitarra = $bllGuitarra->SelectByID($id);

if ($guitarra) {
    $qtdeEstoqueAtual = $guitarra->getQtdeEstoque();
    $novaQtdeEstoque = $qtdeEstoqueAtual - $qtdeCompra;

    $guitarra->setQtdeEstoque($novaQtdeEstoque);
    $result = $bllGuitarra->UpdateEstoque($guitarra);  

    if ($result) {
        header("Location: ../guitarra.php");
        exit();
    } else {
        echo "Erro ao atualizar o estoque.";
    }
} else {
    echo "Guitarra não encontrada.";
}
?>
