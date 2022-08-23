<?php

namespace App\Repository\Compose\Data;

use App\Models\title_filter as ModelsFilter;
use Illuminate\View\View;

class TitleFilterAll
{
    public function compose(View $view)
    {
        return $view->with(['title_filter_all' => ModelsFilter::all()]);
    }
}