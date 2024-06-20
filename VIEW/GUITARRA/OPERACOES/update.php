<?php
    namespace VIEW\Guitarra;

    include_once __DIR__ . '../../../../MODEL/Guitarra.php';
    include_once __DIR__ . '../../../../BLL/Guitarra.php';

    use \MODEL\Guitarra;
    use \BLL\Guitarra as BLLGuitarra;

    $guitarra = new Guitarra();

    $guitarra->setId($_POST['id']);
    $guitarra->setDescricao($_POST['descricao']);
    $guitarra->setModelo($_POST['modelo']);
    $guitarra->setMarca($_POST['marca']);
    $guitarra->setAno($_POST['ano']);
    $guitarra->setNumCordas($_POST['numCordas']);
    $guitarra->setCor($_POST['cor']);
    $guitarra->setQtdeEstoque($_POST['qtdeEstoque']);
    $guitarra->setVlrVenda($_POST['vlrVenda']);

    if ($_FILES['imagem']['size'] > 0) {
        $imagemTipo = $_FILES['imagem']['type'];
        $imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);
        $guitarra->setImagem($imagemConteudo);
        $guitarra->setTipoImagem($imagemTipo);
    } else {
        $guitarraAtual = (new BLLGuitarra())->SelectByID($_POST['id']);
        $guitarra->setImagem($guitarraAtual->getImagem());
        $guitarra->setTipoImagem($guitarraAtual->getTipoImagem());
    }

    $bllGuit = new BLLGuitarra();
    $result = $bllGuit->Update($guitarra);

    header("location: ../gerenciador.php");
?>
