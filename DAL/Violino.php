<?php

namespace DAL;

use \PDO;

include_once __DIR__ . '../../DAL/Conexao.php';
include_once __DIR__ . '../../MODEL/Violino.php';

class Violino
{
    public function Select()
    {
        $sql = "Select * from violino;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        foreach ($registros as $linha) {
            $violino = new \MODEL\Violino();

            $violino->setId($linha['ID_VIOLINO']);
            $violino->setDescricao($linha['DESCRICAO']);
            $violino->setModelo($linha['MODELO']);
            $violino->setMarca($linha['MARCA']);
            $violino->setAno($linha['ANO']);
            $violino->setCor($linha['COR']);
            $violino->setQtdeEstoque($linha['QTDE_ESTOQUE']);
            $violino->setVlrVenda($linha['VLR_VENDA']);
            $violino->setImagem($linha['IMAGEM']);
            $violino->setTipoImagem($linha['TIPO_IMAGEM']);

            $lstViolino[] = $violino;
        }

        return $lstViolino;
    }

    public function SelectByID(int $id)
    {
        $sql = "Select * from violino where ID_VIOLINO=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        $violino = new \MODEL\Violino();
        $violino->setId($linha['ID_VIOLINO']);
        $violino->setDescricao($linha['DESCRICAO']);
        $violino->setModelo($linha['MODELO']);
        $violino->setMarca($linha['MARCA']);
        $violino->setAno($linha['ANO']);
        $violino->setCor($linha['COR']);
        $violino->setQtdeEstoque($linha['QTDE_ESTOQUE']);
        $violino->setVlrVenda($linha['VLR_VENDA']);
        $violino->setImagem($linha['IMAGEM']);
        $violino->setTipoImagem($linha['TIPO_IMAGEM']);

        return $violino;
    }

    public function Update(\MODEL\Violino $violino)
    {
        $con = Conexao::conectar();

        $sql = "UPDATE violino 
                SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, COR = ?, QTDE_ESTOQUE = ?, VLR_VENDA = ?, IMAGEM = ?, TIPO_IMAGEM = ?
                WHERE ID_VIOLINO = ?;";
        
        $stmt = $con->prepare($sql);

        $descricao = $violino->getDescricao();
        $modelo = $violino->getModelo();
        $marca = $violino->getMarca();
        $ano = $violino->getAno();
        $cor = $violino->getCor();
        $qtdeEstoque = $violino->getQtdeEstoque();
        $vlrVenda = $violino->getVlrVenda();
        $imagem = $violino->getImagem();
        $tipoImagem = $violino->getTipoImagem();
        $id = $violino->getID();

        $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
        $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
        $stmt->bindParam(3, $marca, PDO::PARAM_STR);
        $stmt->bindParam(4, $ano, PDO::PARAM_INT);
        $stmt->bindParam(5, $cor, PDO::PARAM_STR);
        $stmt->bindParam(6, $qtdeEstoque, PDO::PARAM_INT);
        $stmt->bindParam(7, $vlrVenda, PDO::PARAM_STR);
        $stmt->bindParam(8, $imagem, PDO::PARAM_LOB);
        $stmt->bindParam(9, $tipoImagem, PDO::PARAM_STR);
        $stmt->bindParam(10, $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "delete from violino WHERE ID_VIOLINO = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
        
    public function Create(\MODEL\Violino $violino)
    {
        $sql = "INSERT INTO violino (DESCRICAO, MODELO, MARCA, ANO, COR, QTDE_ESTOQUE, VLR_VENDA, IMAGEM, TIPO_IMAGEM) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::conectar();
                
        $stmt = $con->prepare($sql);

        $stmt->bindParam(1, $violino->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(2, $violino->getModelo(), PDO::PARAM_STR);
        $stmt->bindParam(3, $violino->getMarca(), PDO::PARAM_STR);
        $stmt->bindParam(4, $violino->getAno(), PDO::PARAM_INT);
        $stmt->bindParam(5, $violino->getCor(), PDO::PARAM_STR);
        $stmt->bindParam(6, $violino->getQtdeEstoque(), PDO::PARAM_INT);
        $stmt->bindParam(7, $violino->getVlrVenda(), PDO::PARAM_STR);
        $stmt->bindParam(8, $violino->getImagem(), PDO::PARAM_LOB);
        $stmt->bindParam(9, $violino->getTipoImagem(), PDO::PARAM_STR);
        
        $stmt->execute();

        $con = Conexao::desconectar();

        return $stmt;
    }
}
