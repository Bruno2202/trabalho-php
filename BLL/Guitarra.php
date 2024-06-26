<?php

namespace BLL;

include_once __DIR__ . '../../DAL/Guitarra.php';

use DAL;

class Guitarra
{
    public function Select()
    {
        $dalGuit = new \DAL\Guitarra();
        return $dalGuit->Select();
    }

    public function SelectByID(int $id)
    {
        $dalGuit = new \DAL\Guitarra();
        return $dalGuit->SelectByID($id);
    }

    public function Update(\MODEL\Guitarra $guitarra)
    {
        $dalGuit = new \DAL\Guitarra();
        return $dalGuit->Update($guitarra);
    }

    public function UpdateEstoque(\MODEL\Guitarra $guitarra)
    {
        $dalGuitarra = new \DAL\Guitarra();
        return $dalGuitarra->UpdateEstoque($guitarra);
    }

    public function Delete(int $id)
    {
        $dalGuit = new \DAL\Guitarra();
        return $dalGuit->Delete($id);
    }

    public function Create(\MODEL\Guitarra $guitarra) {
        $dalGuit = new \DAL\Guitarra();   
        
        return $dalGuit->Create($guitarra);
    }
}
