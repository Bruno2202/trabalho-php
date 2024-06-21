<?php 
namespace VIEW\Piano;

include_once __DIR__ . '../../../../MODEL/Piano.php'; 
include_once __DIR__ . '../../../../BLL/Piano.php'; 

use \BLL\Piano as BLLPiano;

$id = $_GET['id'];
$qtdeCompra = $_GET['qtdeCompra'];

$bllPiano = new BLLPiano();
$piano = $bllPiano->SelectByID($id);

if ($piano) {
    $qtdeEstoqueAtual = $piano->getQtdeEstoque();
    $novaQtdeEstoque = $qtdeEstoqueAtual - $qtdeCompra;

    $piano->setQtdeEstoque($novaQtdeEstoque);
    $result = $bllPiano->UpdateEstoque($piano);  

    if ($result) {
        header("Location: ../piano.php");
        exit();
    } else {
        echo "Erro ao atualizar o estoque.";
    }
} else {
    echo "Piano não encontrada.";
}
?>
