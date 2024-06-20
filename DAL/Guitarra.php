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
        $con = Conexao::conectar();

        $sql = "UPDATE guitarra 
                SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_CORDAS = ?, COR = ?, QTDE_ESTOQUE = ?, VLR_VENDA = ?, IMAGEM = ?, TIPO_IMAGEM = ?  
                WHERE ID_GUITARRA = ?;";

        $stmt = $con->prepare($sql);

        $descricao = $guit->getDescricao();
        $modelo = $guit->getModelo();
        $marca = $guit->getMarca();
        $ano = $guit->getAno();
        $numCordas = $guit->getNumCordas();
        $cor = $guit->getCor();
        $qtdeEstoque = $guit->getQtdeEstoque();
        $vlrVenda = $guit->getVlrVenda();
        $imagem = $guit->getImagem();
        $tipoImagem = $guit->getTipoImagem();
        $id = $guit->getID();

        $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
        $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
        $stmt->bindParam(3, $marca, PDO::PARAM_STR);
        $stmt->bindParam(4, $ano, PDO::PARAM_INT);
        $stmt->bindParam(5, $numCordas, PDO::PARAM_INT);
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
        $sql = "delete from guitarra WHERE ID_GUITARRA = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
        
    public function Create(\MODEL\Guitarra $guit)
    {
        $sql = "INSERT INTO guitarra (DESCRICAO, MODELO, MARCA, ANO, NUM_CORDAS, COR, QTDE_ESTOQUE, VLR_VENDA, IMAGEM, TIPO_IMAGEM) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::conectar();
        
        $stmt = $con->prepare($sql);
        
        $stmt->bindParam(1, $guit->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(2, $guit->getModelo(), PDO::PARAM_STR);
        $stmt->bindParam(3, $guit->getMarca(), PDO::PARAM_STR);
        $stmt->bindParam(4, $guit->getAno(), PDO::PARAM_INT);
        $stmt->bindParam(5, $guit->getNumCordas(), PDO::PARAM_INT);
        $stmt->bindParam(6, $guit->getCor(), PDO::PARAM_STR);
        $stmt->bindParam(7, $guit->getQtdeEstoque(), PDO::PARAM_INT);
        $stmt->bindParam(8, $guit->getVlrVenda(), PDO::PARAM_STR);
        $stmt->bindParam(9, $guit->getImagem(), PDO::PARAM_LOB);
        $stmt->bindParam(10, $guit->getTipoImagem(), PDO::PARAM_STR);

        $stmt->execute();

        $con = Conexao::desconectar();

        return $stmt;
    }
}
