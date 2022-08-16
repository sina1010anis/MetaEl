<?php

namespace App\Repository\Compose\Data;

use App\Models\City;
use Illuminate\View\View;

class CityAll{

    public function compose(View $view)
    {
        return $view->with('city_all' , City::all());
    }

}

?>