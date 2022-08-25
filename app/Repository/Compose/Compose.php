<?php

namespace App\Repository\Compose;

use App\Repository\Compose\Data\CityAll;
use App\Repository\Compose\Data\FilterAll;
use App\Repository\Compose\Data\MenuAll;
use App\Repository\Compose\Data\ProductSizeAll;
use App\Repository\Compose\Data\StateAll;
use App\Repository\Compose\Data\SubMenuAll;
use App\Repository\Compose\Data\UserAll;
use App\Repository\Compose\Data\ProductAll;
use App\Repository\Compose\Data\TitleFilterAll;
use Illuminate\Support\Facades\View;

class Compose{
    public function set_compose()
    {
        View::composer(['*'] , MenuAll::class);
        View::composer(['*'] , SubMenuAll::class);
        View::composer(['*'] , CityAll::class);
        View::composer(['*'] , StateAll::class);
        View::composer(['*'] , UserAll::class);
        View::composer(['*'] , ProductSizeAll::class);
        View::composer(['*'] , ProductAll::class);
        View::composer(['*'] , TitleFilterAll::class);
        View::composer(['*'] , FilterAll::class);
    }
}

?>