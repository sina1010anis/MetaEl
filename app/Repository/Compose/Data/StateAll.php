<?php

namespace App\Repository\Compose\Data;

use App\Models\State;
use Illuminate\View\View;

class StateAll{

    public function compose(View $view)
    {
        return $view->with('state_all' , State::all());
    }

}

?>