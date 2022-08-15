<?php

namespace App\Repository\Compose\Data;

use App\Models\Menu;
use Illuminate\View\View;

class MenuAll{

    public function compose(View $view)
    {
        return $view->with('menu_all' , Menu::all());
    }

}

?>