<?php 
    namespace VIEW\Violino;

    include_once __DIR__ . '../../../../MODEL/Violino.php'; 
    include_once __DIR__ . '../../../../BLL/Violino.php'; 

    use \MODEL\Violino;
    use \BLL\Violino as BLLViolino;

    $violino = new Violino();

    $violino->setId($_POST['id']);
    $violino->setDescricao($_POST['descricao']);
    $violino->setModelo($_POST['modelo']);
    $violino->setMarca($_POST['marca']);
    $violino->setAno($_POST['ano']);
    $violino->setCor($_POST['cor']);
    $violino->setQtdeEstoque($_POST['qtdeEstoque']);
    $violino->setVlrVenda($_POST['vlrVenda']);

    if ($_FILES['imagem']['size'] > 0) {
        $imagemTipo = $_FILES['imagem']['type'];
        $imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);
        $violino->setImagem($imagemConteudo);
        $violino->setTipoImagem($imagemTipo);
    } else {
        $violinoAtual = (new BLLViolino())->SelectByID($_POST['id']);
        $violino->setImagem($violinoAtual->getImagem());
        $violino->setTipoImagem($violinoAtual->getTipoImagem());
    }

    $bllViolino = new BLLViolino();
    $result = $bllViolino->Update($violino);

    header("location: ../gerenciador.php");
?>