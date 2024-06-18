<?php

namespace DAL;

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

        return $violino;
    }

    public function Update(\MODEL\Violino $violino)
    {
        $sql = "UPDATE violino SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, COR = ? WHERE ID_VIOLINO = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($violino->getDescricao(), $violino->getModelo(), $violino->getMarca(), $violino->getAno(), $violino->getCor(), $violino->getID()));
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
        $sql = "INSERT INTO violino (DESCRICAO, MODELO, MARCA, ANO, COR, QTDE_ESTOQUE, VLR_VENDA) 
        VALUES ('{$violino->getDescricao()}','{$violino->getModelo()}','{$violino->getMarca()}','{$violino->getAno()}','{$violino->getCor()}','{$violino->getQtdeEstoque()}','{$violino->getVlrVenda()}');";
        
        $con = Conexao::conectar();
        $result = $con->query($sql);
        $con = Conexao::desconectar();

        return $result; 
    }
}
