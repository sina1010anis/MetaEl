<?php

namespace App\Repository\Front\Admin\Geter;

trait Created{

    use BindDataPanel;

    public $new_data;

    public function create(Array $data)
    {
        $this->class->create($data);
        return $this;
    }


}

?>