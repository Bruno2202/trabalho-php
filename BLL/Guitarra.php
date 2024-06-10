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

    public function Delete(int $id)
    {
        $dalGuit = new \DAL\Guitarra();
        return $dalGuit->Delete($id);
    }
}
