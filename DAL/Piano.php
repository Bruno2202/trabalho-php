<?php

namespace DAL;

use \PDO;

include_once __DIR__ . '../../DAL/Conexao.php';
include_once __DIR__ . '../../MODEL/Piano.php';

class Piano
{
    public function Select()
    {
        $sql = "Select * from piano;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        foreach ($registros as $linha) {
            $piano = new \MODEL\Piano();

            $piano->setId($linha['ID_PIANO']);
            $piano->setDescricao($linha['DESCRICAO']);
            $piano->setModelo($linha['MODELO']);
            $piano->setMarca($linha['MARCA']);
            $piano->setAno($linha['ANO']);
            $piano->setNumTeclas($linha['NUM_TECLAS']);
            $piano->setCor($linha['COR']);
            $piano->setQtdeEstoque($linha['QTDE_ESTOQUE']);
            $piano->setVlrVenda($linha['VLR_VENDA']);
            $piano->setImagem($linha['IMAGEM']);
            $piano->setTipoImagem($linha['TIPO_IMAGEM']);
            
            $lstPiano[] = $piano;
        }

        return $lstPiano;
    }

    public function SelectByID(int $id)
    {
        $sql = "Select * from piano where ID_PIANO=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        $piano = new \MODEL\Piano();
        $piano->setId($linha['ID_PIANO']);
        $piano->setDescricao($linha['DESCRICAO']);
        $piano->setModelo($linha['MODELO']);
        $piano->setMarca($linha['MARCA']);
        $piano->setAno($linha['ANO']);
        $piano->setNumTeclas($linha['NUM_TECLAS']);
        $piano->setCor($linha['COR']);
        $piano->setQtdeEstoque($linha['QTDE_ESTOQUE']);
        $piano->setVlrVenda($linha['VLR_VENDA']);
        $piano->setImagem($linha['IMAGEM']);
        $piano->setTipoImagem($linha['TIPO_IMAGEM']);

        return $piano;
    }

    public function Update(\MODEL\Piano $piano)
    {
        $con = Conexao::conectar();

        $sql = "UPDATE piano 
                SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_TECLAS = ?, COR = ?, QTDE_ESTOQUE = ?, VLR_VENDA = ?, IMAGEM = ?, TIPO_IMAGEM = ?
                WHERE ID_PIANO = ?;";

        $stmt = $con->prepare($sql);

        $descricao = $piano->getDescricao();
        $modelo = $piano->getModelo();
        $marca = $piano->getMarca();
        $ano = $piano->getAno();
        $numTeclas = $piano->getNumTeclas();
        $cor = $piano->getCor();
        $qtdeEstoque = $piano->getQtdeEstoque();
        $vlrVenda = $piano->getVlrVenda();
        $imagem = $piano->getImagem();
        $tipoImagem = $piano->getTipoImagem();
        $id = $piano->getID();

        $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
        $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
        $stmt->bindParam(3, $marca, PDO::PARAM_STR);
        $stmt->bindParam(4, $ano, PDO::PARAM_INT);
        $stmt->bindParam(5, $numTeclas, PDO::PARAM_INT);
        $stmt->bindParam(6, $cor, PDO::PARAM_STR);
        $stmt->bindParam(7, $qtdeEstoque, PDO::PARAM_INT);
        $stmt->bindParam(8, $vlrVenda, PDO::PARAM_STR);
        $stmt->bindParam(9, $imagem, PDO::PARAM_LOB);
        $stmt->bindParam(10, $tipoImagem, PDO::PARAM_STR);
        $stmt->bindParam(11, $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "delete from piano WHERE ID_PIANO = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
        
    public function Create(\MODEL\Piano $piano)
    {
        $sql = "INSERT INTO piano (DESCRICAO, MODELO, MARCA, ANO, NUM_TECLAS, COR, QTDE_ESTOQUE, VLR_VENDA, IMAGEM, TIPO_IMAGEM) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $con = Conexao::conectar();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(1, $piano->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(2, $piano->getModelo(), PDO::PARAM_STR);
        $stmt->bindParam(3, $piano->getMarca(), PDO::PARAM_STR);
        $stmt->bindParam(4, $piano->getAno(), PDO::PARAM_INT);
        $stmt->bindParam(5, $piano->getNumTeclas(), PDO::PARAM_INT);
        $stmt->bindParam(6, $piano->getCor(), PDO::PARAM_STR);
        $stmt->bindParam(7, $piano->getQtdeEstoque(), PDO::PARAM_INT);
        $stmt->bindParam(8, $piano->getVlrVenda(), PDO::PARAM_STR);
        $stmt->bindParam(9, $piano->getImagem(), PDO::PARAM_LOB);
        $stmt->bindParam(10, $piano->getTipoImagem(), PDO::PARAM_STR);

        $stmt->execute();

        $con = Conexao::desconectar();

        return $stmt;
    }
}
