<?php

namespace BLL;

include_once __DIR__ . '../../DAL/Piano.php';

use DAL;

class Piano
{
    public function Select()
    {
        $dalPiano = new \DAL\Piano();
        return $dalPiano->Select();
    }

    public function SelectByID(int $id)
    {
        $dalPiano = new \DAL\Piano();
        return $dalPiano->SelectByID($id);
    }

    public function Update(\MODEL\Piano $piano)
    {
        $dalPiano = new \DAL\Piano();
        return $dalPiano->Update($piano);
    }

    public function UpdateEstoque(\MODEL\Piano $piano)
    {
        $dalPiano = new \DAL\Piano();
        return $dalPiano->UpdateEstoque($piano);
    }

    public function Delete(int $id)
    {
        $dalPiano = new \DAL\Piano();
        return $dalPiano->Delete($id);
    }

    public function Create(\MODEL\Piano $piano) {
        $dalPiano = new \DAL\Piano();   
        
        return $dalPiano->Create($piano);
    }
}
