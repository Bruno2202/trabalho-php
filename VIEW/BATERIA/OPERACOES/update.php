<?php 
    namespace VIEW\Bateria;

    include_once __DIR__ . '../../../../MODEL/Bateria.php'; 
    include_once __DIR__ . '../../../../BLL/Bateria.php'; 

    use \MODEL\Bateria;
    use \BLL\Bateria as BLLBateria;

    $bateria = new Bateria();

    $bateria->setId($_POST['id']);
    $bateria->setDescricao($_POST['descricao']);
    $bateria->setModelo($_POST['modelo']);
    $bateria->setMarca($_POST['marca']);
    $bateria->setAno($_POST['ano']);
    $bateria->setNumPecas($_POST['numPecas']);
    $bateria->setCor($_POST['cor']);
    $bateria->setQtdeEstoque($_POST['qtdeEstoque']);
    $bateria->setVlrVenda($_POST['vlrVenda']);

    if ($_FILES['imagem']['size'] > 0) {
        $imagemTipo = $_FILES['imagem']['type'];
        $imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);
        $bateria->setImagem($imagemConteudo);
        $bateria->setTipoImagem($imagemTipo);
    } else {
        $bateriaAtual = (new BLLBateria())->SelectByID($_POST['id']);
        $bateria->setImagem($bateriaAtual->getImagem());
        $bateria->setTipoImagem($bateriaAtual->getTipoImagem());
    }

    $bllBateria = new BLLBateria();
    $result = $bllBateria->Update($bateria);  

    header("location: ../gerenciador.php");
?>