<?php

namespace App\Repository\Compose\Data;

use App\Models\filter;
use Illuminate\View\View;

class FilterAll{

    public function compose(View $view)
    {
        return $view->with('filter_all' , filter::all());
    }

}

?>