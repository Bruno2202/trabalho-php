<?php 
namespace VIEW\Violino;

include_once __DIR__ . '../../../../MODEL/Violino.php'; 
include_once __DIR__ . '../../../../BLL/Violino.php'; 

use \BLL\Violino as BLLViolino;

$id = $_GET['id'];
$qtdeCompra = $_GET['qtdeCompra'];

$bllViolino = new BLLViolino();
$violino = $bllViolino->SelectByID($id);

if ($violino) {
    $qtdeEstoqueAtual = $violino->getQtdeEstoque();
    $novaQtdeEstoque = $qtdeEstoqueAtual - $qtdeCompra;

    $violino->setQtdeEstoque($novaQtdeEstoque);
    $result = $bllViolino->UpdateEstoque($violino);  

    if ($result) {
        header("Location: ../violino.php");
        exit();
    } else {
        echo "Erro ao atualizar o estoque.";
    }
} else {
    echo "Violino não encontrado.";
}
?>
