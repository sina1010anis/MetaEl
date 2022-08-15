<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageBtn extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $model;
    public $id;
    public function __construct($model , $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-btn');
    }
}
