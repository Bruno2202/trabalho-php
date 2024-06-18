<?php

namespace DAL;

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

        return $piano;
    }

    public function Update(\MODEL\Piano $piano)
    {
        $sql = "UPDATE piano SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_TECLAS = ?, COR = ? WHERE ID_PIANO = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($piano->getDescricao(), $piano->getModelo(), $piano->getMarca(), $piano->getAno(), $piano->getNumTeclas(), $piano->getCor(), $piano->getID()));
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
        $sql = "INSERT INTO piano (DESCRICAO, MODELO, MARCA, ANO, NUM_TECLAS, COR, QTDE_ESTOQUE, VLR_VENDA) 
        VALUES ('{$piano->getDescricao()}','{$piano->getModelo()}','{$piano->getMarca()}','{$piano->getAno()}','{$piano->getNumTeclas()}','{$piano->getCor()}','{$piano->getQtdeEstoque()}','{$piano->getVlrVenda()}');";
        
        $con = Conexao::conectar();
        $result = $con->query($sql);
        $con = Conexao::desconectar();

        return $result; 
    }
}
