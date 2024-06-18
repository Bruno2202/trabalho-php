<?php

namespace BLL;

include_once __DIR__ . '../../DAL/Bateria.php';

use DAL;

class Bateria
{
    public function Select()
    {
        $dalBateria = new \DAL\Bateria();
        return $dalBateria->Select();
    }

    public function SelectByID(int $id)
    {
        $dalBateria = new \DAL\Bateria();
        return $dalBateria->SelectByID($id);
    }

    public function Update(\MODEL\Bateria $bateria)
    {
        $dalBateria = new \DAL\Bateria();
        return $dalBateria->Update($bateria);
    }

    public function Delete(int $id)
    {
        $dalBateria = new \DAL\Bateria();
        return $dalBateria->Delete($id);
    }

    public function Create(\MODEL\Bateria $bateria) {
        $dalBateria = new \DAL\Bateria();   
        
        return $dalBateria->Create($bateria);
    }
}
