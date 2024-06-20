<?php 
    namespace VIEW\Piano;

    include_once __DIR__ . '../../../../MODEL/Piano.php'; 
    include_once __DIR__ . '../../../../BLL/Piano.php'; 

    use \MODEL\Piano;
    use \BLL\Piano as BLLPiano;

    $piano = new Piano();

    $piano->setId($_POST['id']);
    $piano->setDescricao($_POST['descricao']);
    $piano->setModelo($_POST['modelo']);
    $piano->setMarca($_POST['marca']);
    $piano->setAno($_POST['ano']);
    $piano->setNumTeclas($_POST['numTeclas']);
    $piano->setCor($_POST['cor']);
    $piano->setQtdeEstoque($_POST['qtdeEstoque']);
    $piano->setVlrVenda($_POST['vlrVenda']);

    if ($_FILES['imagem']['size'] > 0) {
        $imagemTipo = $_FILES['imagem']['type'];
        $imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);
        $piano->setImagem($imagemConteudo);
        $piano->setTipoImagem($imagemTipo);
    } else {
        $pianoAtual = (new BLLPiano())->SelectByID($_POST['id']);
        $piano->setImagem($pianoAtual->getImagem());
        $piano->setTipoImagem($pianoAtual->getTipoImagem());
    }

    $bllPiano = new BLLPiano();
    $result = $bllPiano->Update($piano);

    header("location: ../gerenciador.php");
?>