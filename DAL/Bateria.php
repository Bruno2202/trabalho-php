<?php

namespace DAL;

use \PDO;

include_once __DIR__ . '../../DAL/Conexao.php';
include_once __DIR__ . '../../MODEL/Bateria.php';

class Bateria
{
    public function Select()
    {
        $sql = "Select * from bateria;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        foreach ($registros as $linha) {
            $bateria = new \MODEL\Bateria();

            $bateria->setId($linha['ID_BATERIA']);
            $bateria->setDescricao($linha['DESCRICAO']);
            $bateria->setModelo($linha['MODELO']);
            $bateria->setMarca($linha['MARCA']);
            $bateria->setAno($linha['ANO']);
            $bateria->setNumPecas($linha['NUM_PECAS']);
            $bateria->setCor($linha['COR']);
            $bateria->setQtdeEstoque($linha['QTDE_ESTOQUE']);
            $bateria->setVlrVenda($linha['VLR_VENDA']);
            $bateria->setImagem($linha['IMAGEM']);
            $bateria->setTipoImagem($linha['TIPO_IMAGEM']);

            $lstBateria[] = $bateria;
        }

        return $lstBateria;
    }

    public function SelectByID(int $id)
    {
        $sql = "Select * from bateria where ID_BATERIA=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        $bateria = new \MODEL\Bateria();
        $bateria->setId($linha['ID_BATERIA']);
        $bateria->setDescricao($linha['DESCRICAO']);
        $bateria->setModelo($linha['MODELO']);
        $bateria->setMarca($linha['MARCA']);
        $bateria->setAno($linha['ANO']);
        $bateria->setNumPecas($linha['NUM_PECAS']);
        $bateria->setCor($linha['COR']);
        $bateria->setQtdeEstoque($linha['QTDE_ESTOQUE']);
        $bateria->setVlrVenda($linha['VLR_VENDA']);
        $bateria->setImagem($linha['IMAGEM']);
        $bateria->setTipoImagem($linha['TIPO_IMAGEM']);

        return $bateria;
    }

    public function Update(\MODEL\Bateria $bateria)
    {
        $con = Conexao::conectar();

        $sql = "UPDATE bateria 
                SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_PECAS = ?, COR = ?, QTDE_ESTOQUE = ?, VLR_VENDA = ?, IMAGEM = ?, TIPO_IMAGEM = ? 
                WHERE ID_BATERIA = ?;";

        $stmt = $con->prepare($sql);

        $descricao = $bateria->getDescricao();
        $modelo = $bateria->getModelo();
        $marca = $bateria->getMarca();
        $ano = $bateria->getAno();
        $numPecas = $bateria->getNumPecas();
        $cor = $bateria->getCor();
        $qtdeEstoque = $bateria->getQtdeEstoque();
        $vlrVenda = $bateria->getVlrVenda();
        $imagem = $bateria->getImagem();
        $tipoImagem = $bateria->getTipoImagem();
        $id = $bateria->getID();

        $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
        $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
        $stmt->bindParam(3, $marca, PDO::PARAM_STR);
        $stmt->bindParam(4, $ano, PDO::PARAM_INT);
        $stmt->bindParam(5, $numPecas, PDO::PARAM_INT);
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
        $sql = "delete from bateria WHERE ID_BATERIA = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
        
    public function Create(\MODEL\Bateria $bateria)
    {
        $sql = "INSERT INTO bateria (DESCRICAO, MODELO, MARCA, ANO, NUM_PECAS, COR, QTDE_ESTOQUE, VLR_VENDA, IMAGEM, TIPO_IMAGEM) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::conectar();
        
        $stmt = $con->prepare($sql);
        
        $stmt->bindParam(1, $bateria->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(2, $bateria->getModelo(), PDO::PARAM_STR);
        $stmt->bindParam(3, $bateria->getMarca(), PDO::PARAM_STR);
        $stmt->bindParam(4, $bateria->getAno(), PDO::PARAM_INT);
        $stmt->bindParam(5, $bateria->getNumPecas(), PDO::PARAM_INT);
        $stmt->bindParam(6, $bateria->getCor(), PDO::PARAM_STR);
        $stmt->bindParam(7, $bateria->getQtdeEstoque(), PDO::PARAM_INT);
        $stmt->bindParam(8, $bateria->getVlrVenda(), PDO::PARAM_STR);
        $stmt->bindParam(9, $bateria->getImagem(), PDO::PARAM_LOB);
        $stmt->bindParam(10, $bateria->getTipoImagem(), PDO::PARAM_STR);

        $stmt->execute();

        $con = Conexao::desconectar();

        return $stmt;
    }
}
