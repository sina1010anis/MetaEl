<?php

namespace App\Repository\Front\Data;

use App\Models\Menu;

trait Models
{
    public function Menus()
    {
        return Menu::query();
    }
}
