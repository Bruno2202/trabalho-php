<?php

namespace DAL;

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

        return $guit;
    }

    public function Update(\MODEL\Guitarra $guit)
    {
        $sql = "UPDATE guitarra SET DESCRICAO = ?, MODELO = ?, MARCA = ?, ANO = ?, NUM_CORDAS = ?, COR = ? WHERE ID_GUITARRA = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($guit->getDescricao(), $guit->getModelo(), $guit->getMarca(), $guit->getAno(), $guit->getNumCordas(), $guit->getCor(), $guit->getID()));
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
}
