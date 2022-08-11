<?php

namespace App\Repository\Front\Admin\Geter;

use App\Repository\Front\Back;

trait Created{

    use BindDataPanel , Back;

    public $new_data;

    public function create(Array $data)
    {
        $this->class->create($data);
        return $this;
    }


}

?>