<?php

namespace App\Repository\Front\Data;

use App\Models\Menu;

trait Datas
{

    public function setModel($model , $where , $get)
    {
        return $model->$where;
    }

}
