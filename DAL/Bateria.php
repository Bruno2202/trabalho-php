<?php

namespace DAL;

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

        return $bateria;
    }

    public function Update(\MODEL\Bateria $bateria)
    {
        $sql = "UPDATE bateria SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_PECAS = ?, COR = ? WHERE ID_BATERIA = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($bateria->getDescricao(), $bateria->getModelo(), $bateria->getMarca(), $bateria->getAno(), $bateria->getNumPecas(), $bateria->getCor(), $bateria->getID()));
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
        $sql = "INSERT INTO bateria (DESCRICAO, MODELO, MARCA, ANO, NUM_PECAS, COR, QTDE_ESTOQUE, VLR_VENDA) 
        VALUES ('{$bateria->getDescricao()}','{$bateria->getModelo()}','{$bateria->getMarca()}','{$bateria->getAno()}','{$bateria->getNumPecas()}','{$bateria->getCor()}','{$bateria->getQtdeEstoque()}','{$bateria->getVlrVenda()}');";
        
        $con = Conexao::conectar();
        $result = $con->query($sql);
        $con = Conexao::desconectar();

        return $result; 
    }
}
