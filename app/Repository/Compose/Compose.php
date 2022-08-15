<?php

namespace App\Repository\Compose;

use App\Repository\Compose\Data\MenuAll;
use App\Repository\Compose\Data\SubMenuAll;
use Illuminate\Support\Facades\View;

class Compose{
    public function set_compose()
    {
        View::composer(['*'] , MenuAll::class);
        View::composer(['*'] , SubMenuAll::class);
    }
}

?>