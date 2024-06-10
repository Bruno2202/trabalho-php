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

    public function Delete(int $id)
    {
        $dalGuit = new \DAL\Guitarra();
        return $dalGuit->Delete($id);
    }
}
