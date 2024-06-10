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

    public function Delete(int $id){
        $sql = "delete from guitarra WHERE ID_GUITARRA = ?;";
        
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array( $id ));
        $con = Conexao::desconectar();
      
        return $result; 
    }
}
?>