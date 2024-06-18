<?php

namespace BLL;

include_once __DIR__ . '../../DAL/Violino.php';

use DAL;

class Violino
{
    public function Select()
    {
        $dalViolino = new \DAL\Violino();
        return $dalViolino->Select();
    }

    public function SelectByID(int $id)
    {
        $dalViolino = new \DAL\Violino();
        return $dalViolino->SelectByID($id);
    }

    public function Update(\MODEL\Violino $violino)
    {
        $dalViolino = new \DAL\Violino();
        return $dalViolino->Update($violino);
    }

    public function Delete(int $id)
    {
        $dalViolino = new \DAL\Violino();
        return $dalViolino->Delete($id);
    }

    public function Create(\MODEL\Violino $violino) {
        $dalViolino = new \DAL\Violino();   
        
        return $dalViolino->Create($violino);
    }
}
