<?php

namespace DAL;

use \PDO;

include_once __DIR__ . '../../DAL/Conexao.php';
include_once __DIR__ . '../../MODEL/Guitarra.php';

class Guitarra
{
    public function Select()
    {
        $sql = "Select * from guitarra;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        foreach ($registros as $linha) {
            $guit = new \MODEL\Guitarra();

            $guit->setId($linha['ID_GUITARRA']);
            $guit->setDescricao($linha['DESCRICAO']);
            $guit->setModelo($linha['MODELO']);
            $guit->setMarca($linha['MARCA']);
            $guit->setAno($linha['ANO']);
            $guit->setNumCordas($linha['NUM_CORDAS']);
            $guit->setCor($linha['COR']);
            $guit->setQtdeEstoque($linha['QTDE_ESTOQUE']);
            $guit->setVlrVenda($linha['VLR_VENDA']);
            $guit->setImagem($linha['IMAGEM']);
            $guit->setTipoImagem($linha['TIPO_IMAGEM']);

            $lstGuit[] = $guit;
        }

        return $lstGuit;
    }

    public function SelectByID(int $id)
    {
        $sql = "Select * from guitarra where ID_GUITARRA=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        $guit = new \MODEL\Guitarra();
        $guit->setId($linha['ID_GUITARRA']);
        $guit->setDescricao($linha['DESCRICAO']);
        $guit->setModelo($linha['MODELO']);
        $guit->setMarca($linha['MARCA']);
        $guit->setAno($linha['ANO']);
        $guit->setNumCordas($linha['NUM_CORDAS']);
        $guit->setCor($linha['COR']);
        $guit->setQtdeEstoque($linha['QTDE_ESTOQUE']);
        $guit->setVlrVenda($linha['VLR_VENDA']);
        $guit->setImagem($linha['IMAGEM']);
        $guit->setTipoImagem($linha['TIPO_IMAGEM']);

        return $guit;
    }

    public function Update(\MODEL\Guitarra $guit)
    {
        $sql = "UPDATE guitarra SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_CORDAS = ?, COR = ?, QTDE_ESTOQUE = ?, VLR_VENDA = ?, IMAGEM = ?, TIPO_IMAGEM = ?  WHERE ID_GUITARRA = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($guit->getDescricao(), $guit->getModelo(), $guit->getMarca(), $guit->getAno(), $guit->getNumCordas(), $guit->getCor(), $guit->getQtdeEstoque(), $guit->getVlrVenda(), $guit->getImagem(), $guit->getTipoImagem(), $guit->getID()));
        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "delete from guitarra WHERE ID_GUITARRA = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
        
    public function Create(\MODEL\Guitarra $guitarra)
    {
        $sql = "INSERT INTO guitarra (DESCRICAO, MODELO, MARCA, ANO, NUM_CORDAS, COR, QTDE_ESTOQUE, VLR_VENDA, IMAGEM, TIPO_IMAGEM) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::conectar();
        
        $stmt = $con->prepare($sql);
        
        $stmt->bindParam(1, $guitarra->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(2, $guitarra->getModelo(), PDO::PARAM_STR);
        $stmt->bindParam(3, $guitarra->getMarca(), PDO::PARAM_STR);
        $stmt->bindParam(4, $guitarra->getAno(), PDO::PARAM_INT);
        $stmt->bindParam(5, $guitarra->getNumCordas(), PDO::PARAM_INT);
        $stmt->bindParam(6, $guitarra->getCor(), PDO::PARAM_STR);
        $stmt->bindParam(7, $guitarra->getQtdeEstoque(), PDO::PARAM_INT);
        $stmt->bindParam(8, $guitarra->getVlrVenda(), PDO::PARAM_STR);
        $stmt->bindParam(9, $guitarra->getImagem(), PDO::PARAM_LOB);
        $stmt->bindParam(10, $guitarra->getTipoImagem(), PDO::PARAM_STR);

        $stmt->execute();

        $con = Conexao::desconectar();

        return $stmt;
    }
}
