<?php 
namespace VIEW\Bateria;

include_once __DIR__ . '../../../../MODEL/Bateria.php'; 
include_once __DIR__ . '../../../../BLL/Bateria.php'; 

use \BLL\Bateria as BLLBateria;

$id = $_GET['id'];
$qtdeCompra = $_GET['qtdeCompra'];

$bllBateria = new BLLBateria();
$bateria = $bllBateria->SelectByID($id);

if ($bateria) {
    $qtdeEstoqueAtual = $bateria->getQtdeEstoque();
    $novaQtdeEstoque = $qtdeEstoqueAtual - $qtdeCompra;

    $bateria->setQtdeEstoque($novaQtdeEstoque);
    $result = $bllBateria->UpdateEstoque($bateria);  

    if ($result) {
        header("Location: ../bateria.php");
        exit();
    } else {
        echo "Erro ao atualizar o estoque.";
    }
} else {
    echo "Bateria não encontrada.";
}
?>
