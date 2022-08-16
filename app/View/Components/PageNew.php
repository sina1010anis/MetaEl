<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageNew extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $model;
    public $url;
    public function __construct($name , $model , $url)
    {
        $this->model = $model;
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-new');
    }
}
