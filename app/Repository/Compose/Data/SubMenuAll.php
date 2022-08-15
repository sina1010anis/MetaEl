<?php

namespace App\Repository\Compose\Data;

use App\Models\SunMenu;
use Illuminate\View\View;

class SubMenuAll{

    public function compose(View $view)
    {
        return $view->with('sub_menu_all' , SunMenu::all());
    }

}

?>