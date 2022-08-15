<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $model;
    public function __construct($name , $model)
    {
        $this->name = $name;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-view');
    }
}
