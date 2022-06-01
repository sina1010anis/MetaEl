<?php

namespace App\Repository\Front\Data;

use App\Models\Menu;

abstract class Datas
{
    use Models;
    public function menu()
    {
        return $this->Menus()->whereStatus(1)->get();
    }
}
