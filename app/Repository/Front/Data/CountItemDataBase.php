<?php

namespace App\Repository\Front\Data;


trait CountItemDataBase
{
    public function getCount($model ,Array $where = null)
    {
        if ($where != null){
            return $model::where($where)->count();
        }else{
            return $model::count();
        }
    }
}
